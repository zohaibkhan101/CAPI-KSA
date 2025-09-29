<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'job_id',            // Related job
        'name',              // Full name
        'email',             // Email
        'phone',             // Phone number
        'nationality',       // Nationality
        'visa_status',       // Visa / work permit status
        'experience',        // Years of experience
        'education',         // Highest education
        'cv_path',           // Resume / CV path
        'job_source',        // How did applicant hear about the job?
        'reference_name',    // Name of reference person
        'relative_working',  // Any relatives working here? (yes/no)
        'expected_salary',   // Expected salary
        'availability',      // Notice period / available from
        'preferred_hours',   // Full-time, part-time, shift
        'strengths',         // Applicant strengths
        'weaknesses',        // Applicant weaknesses
        'career_goals',      // Career objectives
        'legal_work_status', // Legally allowed to work? (yes/no)
        'can_relocate',      // Willing to relocate? (yes/no)
        'additional_info',   // Other notes/comments
    ];

    /**
     * Relationship: JobApplicant belongs to a Job.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
