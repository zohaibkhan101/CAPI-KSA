<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Jobs') }}
        </h2>
    </x-slot>

    <div x-data="jobDashboard()" x-init="fetchJobs()" class="py-6 px-4">
        <!-- Post Job Button -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Jobs Dashboard</h1>
            <button @click="openForm = !openForm" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                Post New Job
            </button>
        </div>

        <!-- Job Post Form -->
        <div x-show="openForm" class="mb-6 p-6 border rounded-lg shadow-lg bg-white dark:bg-gray-800">
            <!-- Display Errors -->
            <template x-if="errors.length">
                <ul class="mb-4 text-red-600">
                    <template x-for="error in errors" :key="error">
                        <li x-text="error"></li>
                    </template>
                </ul>
            </template>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" x-model="form.title" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Location</label>
                    <input type="text" x-model="form.location" class="w-full border rounded px-3 py-2">
                </div>
                <div class="col-span-2">
                    <label class="block font-medium mb-1">Description</label>
                    <textarea x-model="form.description" class="w-full border rounded px-3 py-2" required></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Type</label>
                    <select x-model="form.type" class="w-full border rounded px-3 py-2">
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1">Deadline</label>
                    <input type="date" x-model="form.deadline" class="w-full border rounded px-3 py-2">
                </div>
            </div>
            <div class="mt-4">
                <button @click="submitJob()" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">
                    <span x-text="editId ? 'Update Job' : 'Post Job'"></span>
                </button>
            </div>
        </div>

        <!-- Jobs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <template x-for="job in jobs" :key="job.id">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2" x-text="job.title"></h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-1"><strong>Location:</strong> <span x-text="job.location"></span></p>
                    <p class="text-gray-600 dark:text-gray-300 mb-1"><strong>Type:</strong> <span x-text="job.type"></span></p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4"><strong>Deadline:</strong> <span x-text="job.deadline"></span></p>

                    <div class="flex flex-wrap gap-2">
                        <button @click="editJob(job)" class="bg-yellow-500 text-white px-3 py-1 rounded shadow hover:bg-yellow-600 transition">Edit</button>
                        <button @click="deleteJob(job.id)" class="bg-red-600 text-white px-3 py-1 rounded shadow hover:bg-red-700 transition">Delete</button>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script>
        function jobDashboard() {
            return {
                openForm: false,
                jobs: [],
                form: { title: '', description: '', location: '', type: 'Full-time', deadline: '' },
                editId: null,
                errors: [],

                fetchJobs() {
                    fetch('/jobs')
                        .then(res => res.json())
                        .then(data => this.jobs = data)
                        .catch(err => console.error('Fetch jobs error:', err));
                },

                submitJob() {
                    this.errors = []; // clear previous errors
                    let url = '/jobs';
                    let method = 'POST';
                    if (this.editId) {
                        url = `/jobs/${this.editId}`;
                        method = 'PUT';
                    }

                    fetch(url, {
                        method,
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.form)
                    })
                    .then(async res => {
                        if (!res.ok) {
                            const data = await res.json().catch(() => null);
                            if (data && data.errors) {
                                this.errors = Object.values(data.errors).flat();
                            } else if (data && data.message) {
                                this.errors = [data.message];
                            } else {
                                this.errors = ['Server error. Check logs.'];
                            }
                            throw new Error('Server error');
                        }
                        return res.json();
                    })
                    .then(data => {
                        this.fetchJobs();
                        this.resetForm();
                    })
                    .catch(err => console.error('Submit error:', err));
                },

                editJob(job) {
                    this.openForm = true;
                    this.editId = job.id;
                    this.form = { ...job };
                },

                deleteJob(id) {
                    if (!confirm('Are you sure?')) return;
                    fetch(`/jobs/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(async res => {
                        if (!res.ok) {
                            const data = await res.json().catch(() => null);
                            this.errors = data?.message ? [data.message] : ['Delete failed'];
                            throw new Error('Delete error');
                        }
                        this.fetchJobs();
                    })
                    .catch(err => console.error('Delete error:', err));
                },

                resetForm() {
                    this.form = { title: '', description: '', location: '', type: 'Full-time', deadline: '' };
                    this.editId = null;
                    this.errors = [];
                    this.openForm = false;
                }
            }
        }
    </script>
</x-app-layout>
