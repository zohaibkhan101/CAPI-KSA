<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get(); // get all jobs
        return view('admin.jobs.manage', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    public function applicants(Job $job)
    {
        // Assuming you have JobApplicant model
        $applicants = $job->applicants; 
        return view('admin.jobs.applicants', compact('job', 'applicants'));
    }
}
