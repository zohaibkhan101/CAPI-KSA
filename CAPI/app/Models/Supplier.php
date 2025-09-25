<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_type',
        'legal_name',
        'address_street',
        'address_line2',
        'address_line3',
        'city',
        'postal_code',
        'country',
        'organization_type',
        'company_profile',
        'contact_first_name',
        'contact_last_name',
        'contact_email',
        'contact_mobile',
        'company_cr',
        'invitation_number',
        'previous_business',
    ];
}
