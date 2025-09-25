<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Jobs') }}
        </h2>
    </x-slot>

    <div x-data="jobDashboard()" x-init="fetchJobs()" class="py-6 px-4">

        <!-- Post Job Button -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Jobs Dashboard</h1>
            <button @click="openForm = !openForm" class="bg-gray-800 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                Post New Job
            </button>
        </div>

        <!-- Job Post Form -->
        <div x-show="openForm" x-cloak class="mb-6 p-6 border rounded-lg shadow-lg bg-white">
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
                <button @click="submitJob()" class="bg-gray-800 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">
                    <span x-text="editId ? 'Update Job' : 'Post Job'"></span>
                </button>
            </div>
        </div>

        <!-- Jobs Grid -->
        <div style="margin: top 10px; gap: 10px;"class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <template x-for="job in jobs" :key="job.id">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2" x-text="job.title"></h3>
                    <p class="text-gray-600 mb-1"><strong>Location:</strong> <span x-text="job.location"></span></p>
                    <p class="text-gray-600 mb-1"><strong>Type:</strong> <span x-text="job.type"></span></p>
                    <p class="text-gray-600 mb-4"><strong>Deadline:</strong> <span x-text="job.deadline"></span></p>

                    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
    <button 
        @click="editJob(job)" 
        style="background-color: #f59e0b; color: white; padding: 6px 12px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.2); border: none; cursor: pointer;"
        onmouseover="this.style.backgroundColor='#f59e0b'"
        onmouseout="this.style.backgroundColor='#f59e0b'"
    >
        Edit
    </button>

    <button 
        @click="deleteJob(job.id)" 
        style="background-color: #ef4444; color: white; padding: 6px 12px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.2); border: none; cursor: pointer;"
        onmouseover="this.style.backgroundColor='#b91c1c'"
        onmouseout="this.style.backgroundColor='#ef4444'"
    >
        Delete
    </button>

    <button 
        @click="openApplicants(job.id)" 
        style="background-color: #4b5563; color: white; padding: 6px 12px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.2); border: none; cursor: pointer;"
        onmouseover="this.style.backgroundColor='#374151'"
        onmouseout="this.style.backgroundColor='#4b5563'"
    >
        Applicants
    </button>
</div>

                    <!-- Applicants Modal -->
                    <div 
                        x-show="applicantModalId === job.id" 
                        x-cloak
                        class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50"
                    >
                        <div class="bg-white rounded-lg shadow-lg max-w-5xl w-full p-6 relative">
                        <button 
            @click="applicantModalId = null; applicants = [];" 
            style="position: absolute; top: 10px; right: 10px; font-size: 24px; font-weight: bold; color: gray; cursor: pointer;"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-2xl font-bold"
        >
            ✕
        </button>
                            <!-- <span @click="applicantModalId = null; applicants = [];" class="absolute top-3 right-4 cursor-pointer text-2xl font-bold text-gray-700">&times;</span> -->
                            
                            <h3 class="text-xl font-bold mb-4">Applicants for <span x-text="job.title"></span></h3>
                            
                           

                            <template x-if="!applicants.length">
                                <p class="text-gray-500 text-center py-6">No applicants yet.</p>
                            </template>

                            <template x-if="applicants.length">
                                <table class="w-full border border-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="border px-3 py-2">Name</th>
                                            <th class="border px-3 py-2">Email</th>
                                            <th class="border px-3 py-2">Phone</th>
                                            <th class="border px-3 py-2">CV</th>
                                            <th class="border px-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="applicant in applicants" :key="applicant.id">
                                            <tr>
                                                <td class="border px-3 py-2" x-text="applicant.name"></td>
                                                <td class="border px-3 py-2" x-text="applicant.email"></td>
                                                <td class="border px-3 py-2" x-text="applicant.phone"></td>
                                                <td class="border px-3 py-2">
                                                    <template x-if="applicant.cv_path">
                                                        <a :href="'/storage/' + applicant.cv_path" target="_blank" class="text-blue-600 underline">View CV</a>
                                                    </template>
                                                    <template x-if="!applicant.cv_path">
                                                        <span class="text-gray-400">No CV</span>
                                                    </template>
                                                </td>
                                                <td class="border px-3 py-2" style="display: flex; gap: 10px;">
                                                <a 
        :href="'mailto:' + applicant.email + 
        '?subject=Application Shortlisted - ' + job.title + 
        '&body=Dear ' + applicant.name + ',%0D%0A%0D%0AWe are pleased to inform you that you have been shortlisted for the position of ' + job.title + 
        '.%0D%0AOur team will contact you for the next steps.%0D%0A%0D%0ARegards,%0D%0AHR Team'"
        style="background: green; color: white; padding: 8px 12px; border-radius: 6px; border: none; cursor: pointer; text-decoration: none;"
    >
        Shortlist
    </a>

    <!-- Reject Button -->
    <a 
        :href="'mailto:' + applicant.email + 
        '?subject=Application Update - ' + job.title + 
        '&body=Dear ' + applicant.name + ',%0D%0A%0D%0AWe appreciate your interest in the ' + job.title + 
        ' role. After careful consideration, we regret to inform you that we will not be moving forward with your application.%0D%0A%0D%0AWe wish you success in your career.%0D%0A%0D%0ARegards,%0D%0AHR Team'"
        style="background: red; color: white; padding: 8px 12px; border-radius: 6px; border: none; cursor: pointer; text-decoration: none;"
    >
        Reject
    </a>
</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </template>
                        </div>
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
                applicants: [],
                applicantModalId: null,
                form: { title: '', description: '', location: '', type: 'Full-time', deadline: '' },
                editId: null,
                errors: [],

                fetchJobs() {
                    fetch('/jobs')
                        .then(res => res.json())
                        .then(data => this.jobs = data)
                        .catch(err => console.error(err));
                },

                openApplicants(jobId) {
                    this.applicantModalId = jobId;
                    this.applicants = [];
                    fetch(`/jobs/${jobId}/applicants`)
                        .then(res => res.json())
                        .then(data => {
                            this.applicants = data.applicants || [];
                        })
                        .catch(err => console.error(err));
                },

                downloadAllCVs(jobId) {
                    window.location.href = `/jobs/${jobId}/download-cvs`;
                },

                shortlistApplicant(applicantId) {
                    fetch(`/applicants/${applicantId}/shortlist`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    }).then(() => this.openApplicants(this.applicantModalId));
                },

                rejectApplicant(applicantId) {
                    fetch(`/applicants/${applicantId}/reject`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    }).then(() => this.openApplicants(this.applicantModalId));
                },

                submitJob() {
                    this.errors = [];
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
                            this.errors = data?.errors ? Object.values(data.errors).flat() : [data?.message || 'Server error'];
                            throw new Error('Server error');
                        }
                        return res.json();
                    })
                    .then(() => {
                        this.fetchJobs();
                        this.resetForm();
                    });
                },

                editJob(job) {
                    this.openForm = true;
                    this.editId = job.id;
                    this.form = { ...job };
                },

                deleteJob(id) {
                    if (!confirm('Are you sure?')) return;
                    fetch(`/jobs/${id}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' } })
                        .then(() => this.fetchJobs());
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
