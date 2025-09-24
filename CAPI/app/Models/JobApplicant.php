<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;

    // Add all columns you want to be mass assignable
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'nationality',
        'experience',
        'education', // don't forget this if you use it
        'cv_path',   // <-- this should match the DB column name
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
