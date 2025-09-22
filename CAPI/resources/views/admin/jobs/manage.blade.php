@extends('layouts.admin')

@section('content')
<div x-data="{ openForm: false }" class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Manage Jobs</h1>
        <button @click="openForm = !openForm" class="bg-blue-600 text-white px-4 py-2 rounded">
            Post Job
        </button>
    </div>

    <!-- Job Post Form -->
    <div x-show="openForm" class="mb-6 p-4 border rounded shadow">
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label>Title</label>
                <input type="text" name="title" class="w-full border p-2" required>
            </div>
            <div class="mb-2">
                <label>Description</label>
                <textarea name="description" class="w-full border p-2" required></textarea>
            </div>
            <div class="mb-2">
                <label>Location</label>
                <input type="text" name="location" class="w-full border p-2">
            </div>
            <div class="mb-2">
                <label>Type</label>
                <select name="type" class="w-full border p-2">
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>
            <div class="mb-2">
                <label>Deadline</label>
                <input type="date" name="deadline" class="w-full border p-2">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Post Job</button>
        </form>
    </div>

    <!-- Jobs Table -->
    <table class="w-full border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Title</th>
                <th class="border p-2">Location</th>
                <th class="border p-2">Type</th>
                <th class="border p-2">Deadline</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td class="border p-2">{{ $job->title }}</td>
                <td class="border p-2">{{ $job->location }}</td>
                <td class="border p-2">{{ $job->type }}</td>
                <td class="border p-2">{{ $job->deadline }}</td>
                <td class="border p-2 flex gap-2">
                    <a href="{{ route('jobs.edit', $job) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('Delete this job?')">Delete</button>
                    </form>
                    <a href="{{ route('jobs.applicants', $job) }}" class="bg-blue-600 text-white px-2 py-1 rounded">Applicants</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
