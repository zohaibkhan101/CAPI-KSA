<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function create()
    {
        return view('supplier.create'); // Blade form
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_type' => 'required|in:Local,International',
            'legal_name' => 'required|string|max:255',
            'address_street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'company_profile' => 'nullable|mimes:pdf|max:2048',
            'contact_first_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_mobile' => 'required|string|max:20',
            'company_cr' => 'nullable|mimes:pdf|max:2048',
            'previous_business' => 'required|boolean'
        ]);

        $supplier = new Supplier();

        $supplier->vendor_type = $request->vendor_type;
        $supplier->legal_name = $request->legal_name;
        $supplier->address_street = $request->address_street;
        $supplier->address_line2 = $request->address_line2;
        $supplier->address_line3 = $request->address_line3;
        $supplier->city = $request->city;
        $supplier->postal_code = $request->postal_code;
        $supplier->country = $request->country;
        $supplier->organization_type = $request->organization_type;
        $supplier->contact_first_name = $request->contact_first_name;
        $supplier->contact_last_name = $request->contact_last_name;
        $supplier->contact_email = $request->contact_email;
        $supplier->contact_mobile = $request->contact_mobile;
        $supplier->invitation_number = $request->invitation_number;
        $supplier->previous_business = $request->previous_business;

        // Upload files
        if ($request->hasFile('company_profile')) {
            $supplier->company_profile = $request->file('company_profile')->store('company_profiles', 'public');
        }
        if ($request->hasFile('company_cr')) {
            $supplier->company_cr = $request->file('company_cr')->store('company_crs', 'public');
        }

        $supplier->save();

        return redirect()->back()->with('success', 'Supplier registration submitted successfully!');
    }
}

