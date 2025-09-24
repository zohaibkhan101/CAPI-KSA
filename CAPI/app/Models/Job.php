<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Add this fillable property
    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'deadline',
    ];
}
