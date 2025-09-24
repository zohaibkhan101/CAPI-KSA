<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplicant;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    // Show all available jobs
    public function index()
    {
        $jobs = Job::latest()->get(); // Fetch jobs from DB
        return view('careers', compact('jobs')); // Pass to Blade
    }

    // Handle job application form submission
    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        JobApplicant::create([
            'job_id' => $job->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'experience' => $request->experience,
            'education' => $request->education,
            'cv_path' => $cvPath
        ]);

        return back()->with('success', 'Your application has been submitted!');
    }
}
