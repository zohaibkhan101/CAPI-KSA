<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\OdooService;

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

    protected static function booted()
    {
        static::created(function ($supplier) {
            $odoo = new OdooService();
            $odooId = $odoo->createVendor($supplier->mapToOdooFields());
            $supplier->odoo_id = $odooId;
            $supplier->save();
        });

        static::updated(function ($supplier) {
            if ($supplier->odoo_id) {
                $odoo = new OdooService();
                $odoo->updateVendor($supplier->odoo_id, $supplier->mapToOdooFields());
            }
        });
    }

    public function mapToOdooFields()
    {
        // If it's a person, join first + last name
        $name = $this->organization_type === 'person'
            ? trim($this->contact_first_name . ' ' . $this->contact_last_name)
            : $this->legal_name;

        // Combine street2 + line3 (Odoo only has 2 street fields)
        $street2 = trim($this->address_line2 . ' ' . $this->address_line3);

        // Append profile + previous business in Notes
        $notes = trim(($this->company_profile ?? '') . "\n" . ($this->previous_business ?? ''));

        return [
            'name'            => $name,
            'street'          => $this->address_street,
            'street2'         => $street2 ?: null,
            'city'            => $this->city,
            'zip'             => $this->postal_code,
            'country_id'      => $this->mapCountryToOdooId($this->country), // must resolve country name -> Odoo ID
            'company_type'    => $this->organization_type === 'company' ? 'company' : 'person',
            'email'           => $this->contact_email,
            'mobile'          => $this->contact_mobile,
            'company_registry'=> $this->company_cr,
            'ref'             => $this->invitation_number,
            'comment'         => $notes ?: null,
        ];
    }

    /**
     * Convert Laravel country value into Odoo country_id
     * You can either store a static map or query Odoo dynamically.
     */
    protected function mapCountryToOdooId($country)
    {
        // Example static mapping (replace with dynamic lookup if possible)
        $map = [
            'Saudi Arabia' => 237,
            'UAE' => 229,
            'Pakistan' => 166,
        ];

        return $map[$country] ?? null; // null if not found
    }
}
