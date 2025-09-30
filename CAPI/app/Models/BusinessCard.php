<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'company', 'email', 'phone', 'website'
    ];
}
