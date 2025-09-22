<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Jobs') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <!-- Post Job Button -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Jobs Dashboard</h1>
            <button @click="openForm = !openForm" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                Post New Job
            </button>
        </div>

        <!-- Job Post Form -->
        <div x-data="{ openForm: false }" x-show="openForm" class="mb-6 p-6 border rounded-lg shadow-lg bg-white dark:bg-gray-800">
            <form action="{{ route('admin.jobs.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Location</label>
                        <input type="text" name="location" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="col-span-2">
                        <label class="block font-medium mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Type</label>
                        <select name="type" class="w-full border rounded px-3 py-2">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Deadline</label>
                        <input type="date" name="deadline" class="w-full border rounded px-3 py-2">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">Post Job</button>
                </div>
            </form>
        </div>

        <!-- Jobs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jobs as $job)
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">{{ $job->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-1"><strong>Location:</strong> {{ $job->location }}</p>
                    <p class="text-gray-600 dark:text-gray-300 mb-1"><strong>Type:</strong> {{ $job->type }}</p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4"><strong>Deadline:</strong> {{ $job->deadline }}</p>

                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.jobs.edit', $job) }}" class="bg-yellow-500 text-white px-3 py-1 rounded shadow hover:bg-yellow-600 transition">Edit</a>
                        <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded shadow hover:bg-red-700 transition" onclick="return confirm('Delete this job?')">Delete</button>
                        </form>
                        <a href="{{ route('admin.jobs.applicants', $job) }}" class="bg-blue-600 text-white px-3 py-1 rounded shadow hover:bg-blue-700 transition">Applicants</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
