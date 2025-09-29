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
        $jobs = Job::latest()->get();
        return view('careers', compact('jobs'));
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
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            // New fields validation
            'visa_status' => 'nullable|string|max:50',
            'job_source' => 'nullable|string|max:255',
            'reference_name' => 'nullable|string|max:255',
            'relative_working' => 'nullable|string|max:10',
            'expected_salary' => 'nullable|string|max:50',
            'availability' => 'nullable|string|max:100',
            'preferred_hours' => 'nullable|string|max:50',
            'strengths' => 'nullable|string',
            'weaknesses' => 'nullable|string',
            'career_goals' => 'nullable|string',
            'legal_work_status' => 'nullable|string|max:10',
            'can_relocate' => 'nullable|string|max:10',
            'additional_info' => 'nullable|string',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        // Save the applicant and assign to variable
        $applicant = JobApplicant::create([
            'job_id' => $job->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'experience' => $request->experience,
            'education' => $request->education,
            'cv_path' => $cvPath,
            // New fields
            'visa_status' => $request->visa_status,
            'job_source' => $request->job_source,
            'reference_name' => $request->reference_name,
            'relative_working' => $request->relative_working,
            'expected_salary' => $request->expected_salary,
            'availability' => $request->availability,
            'preferred_hours' => $request->preferred_hours,
            'strengths' => $request->strengths,
            'weaknesses' => $request->weaknesses,
            'career_goals' => $request->career_goals,
            'legal_work_status' => $request->legal_work_status,
            'can_relocate' => $request->can_relocate,
            'additional_info' => $request->additional_info,
        ]);

        // Return success with reference number
        return redirect()->back()
            ->with('success', 'Your application has been submitted!')
            ->with('ref_number', $applicant->id);
    }

    // Get applicants for a job
    public function getApplicants($jobId)
    {
        $job = Job::find($jobId);

        if (!$job) {
            return response()->json([
                'success' => false,
                'message' => 'Job not found'
            ], 404);
        }

        $applicants = JobApplicant::where('job_id', $jobId)
            ->select(
                'id', 'name', 'email', 'phone', 'nationality', 'experience', 'education', 'cv_path',
                'visa_status', 'job_source', 'reference_name', 'relative_working', 'expected_salary',
                'availability', 'preferred_hours', 'strengths', 'weaknesses', 'career_goals',
                'legal_work_status', 'can_relocate', 'additional_info',
                'created_at'
            )
            ->get();

        return response()->json([
            'success' => true,
            'job' => [
                'id' => $job->id,
                'title' => $job->title
            ],
            'applicants' => $applicants
        ]);
    }
}
