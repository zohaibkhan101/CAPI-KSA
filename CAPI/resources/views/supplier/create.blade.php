@extends('layouts.nav')

@section('title', 'Supplier Registration')

@section('content')
<main>
<section class="page-header">
      <div class="container">
        <h1 data-translate="vendorPageTitle">Supplier Self-Registration Request Form</h1>
        <p class="lead" style="text-align:center;" data-translate="vendorPageSubtitle">
          Centralized registration for suppliers and contractors with CAPI Global.
        </p>
      </div>
</section>

<form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data" class="supplier-form">
    @csrf

    <!-- 1. General Supplier Information -->
    <h2 data-translate="sectionGeneralInfo">1. General Supplier Information</h2>
    <p data-translate="sectionGeneralInfoNote">
        Note: This is the initial step in setting up your company profile on CAPI Global.
    </p>

    <label data-translate="labelVendorType">1.1 Are you a Local or International Vendor? *</label>
    <select name="vendor_type" required>
        <option value="Local" data-translate="optionLocal">Local</option>
        <option value="International" data-translate="optionInternational">International</option>
    </select>

    <label data-translate="labelLegalName">1.2 Supplier Full Legal Name *</label>
    <input type="text" name="legal_name" required>

    <label data-translate="labelAddress">1.3 Supplier Main Address *</label>
    <input type="text" name="address_street" placeholder="Street *" required>
    <input type="text" name="address_line2" placeholder="Line 2">
    <input type="text" name="address_line3" placeholder="Line 3">
    <input type="text" name="city" placeholder="City *" required>
    <input type="text" name="postal_code" placeholder="Postal Code *" required>
    <input type="text" name="country" placeholder="Country/Region *" required>

    <label data-translate="labelOrgType">1.4 Please identify your organization's type *</label>
    <input type="text" name="organization_type" required>

    <label data-translate="labelCompanyProfile">1.5 Please attach your company profile *</label>
    <input type="file" name="company_profile" accept="application/pdf">

    <!-- 2. Primary Supplier Contact -->
    <h2 data-translate="sectionPrimaryContact">2. Primary Supplier Contact</h2>
    <input type="text" name="contact_first_name" placeholder="Contact First Name *" required>
    <input type="text" name="contact_last_name" placeholder="Contact Last Name *" required>
    <input type="email" name="contact_email" placeholder="Contact Email *" required>
    <input type="text" name="contact_mobile" placeholder="Contact Mobile Number *" required>

    <!-- 3. Additional Info -->
    <h2 data-translate="sectionAdditionalInfo">3. Additional Information</h2>
    <label data-translate="labelCompanyCR">3.1 Please attach your company CR *</label>
    <input type="file" name="company_cr" accept="application/pdf">
    <label data-translate="labelInvitationNumber">3.4 Invitation Number</label>
    <input type="text" name="invitation_number">
    <label data-translate="labelPreviousBusiness">3.5 Have you/your company done business with CAPI Global in the past? *</label>
    <select name="previous_business" required>
        <option value="1" data-translate="optionYes">Yes</option>
        <option value="0" data-translate="optionNo">No</option>
    </select>

    <button type="submit" class="btn-register" data-translate="submitRegistration">Submit Registration</button>
</form>
</main>

<!-- Internal CSS -->
<style>
    .supplier-form {
        max-width: 90%;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1, h2, h3, h4, h5, h6 {
        text-align: center;
    }

    .supplier-form h2 {
        font-size: 1.4rem;
        margin-top: 20px;
        margin-bottom: 10px;
        color: #AA6C39;
    }

    .supplier-form p {
        text-align: center;
        font-style: italic;
        color: #374151;
        margin-bottom: 15px;
    }

    .supplier-form label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
    }

    .supplier-form input[type="text"],
    .supplier-form input[type="email"],
    .supplier-form select,
    .supplier-form input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-top: 5px;
    }

    .btn-register {
        display: block;
        background-color: #AA6C39;
        color: white;
        padding: 12px 30px;
        font-weight: bold;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        text-align: center;
        margin: 20px auto 0;
        transition: background 0.3s ease;
    }

    .btn-register:hover {
        background-color: #AA6C39;
    }
</style>
<!-- SweetAlert for success/error -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#2563eb',
            });
        @endif

        @if($errors->any())
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessages,
                confirmButtonColor: '#ef4444',
            });
        @endif
    });
</script>

<script src="{{ asset('/js/translations.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>

@endsection
