@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Vendor Registration') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->
  <main>
    <!-- Page Header -->
    <section class="page-header">
      <div class="container">
        <h1 data-translate="vendorPageTitle">Vendor Registration Guidelines</h1>
        <p class="lead" style="text-align:center;"data-translate="vendorPageSubtitle">
          Centralized registration for suppliers and contractors with CAPI Global.
        </p>
      </div>
    </section>

    <!-- Vendor Guidelines Content -->
    <section class="container content">
      <h2 data-translate="vendorProcessTitle">Registration Process</h2>
      <p data-translate="vendorProcessDesc">
        The CAPI Global Vendor Registration process is centralized through the CAPI Vendor Portal. 
        The portal provides a single online location where suppliers and contractors can register 
        in a fast and efficient manner to be able to:
      </p>

      <ul class="guideline-list">
        <li data-translate="vendorPoint1">Collaborate with CAPI Global for specific products and services.</li>
        <li data-translate="vendorPoint2">Update company profiles and upload the latest commercial registrations and certifications.</li>
        <li data-translate="vendorPoint3">Receive communications from the Supplier Relationship Management team.</li>
      </ul>
      <div style="text-align: center; margin-top: 30px;">
<a href="{{ route('supplier.create') }}" class="btn primary" style="display: inline-block; 
            padding: 12px 30px; 
            background-color: #AA6C39; 
            margin-top: 20px;
            color: #fff; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold;" data-translate="RegisterNow">Register Now</a>
</div>
      <h2 data-translate="vendorOpportunitiesTitle">Opportunities & Tenders</h2>
      <p data-translate="vendorOpportunitiesDesc">
        By registering in the CAPI Vendor Portal, vendors can outline the range of products and services 
        they are licensed to provide. If these products or services match the requirements of future tenders, 
        the Procurement & Supply Chain team may contact the supplier directly with an Expression of Interest (EOI).
      </p>

      <h2 data-translate="vendorDisclaimerTitle">Disclaimer</h2>
      <p data-translate="vendorDisclaimerDesc">
        By participating in this registration exercise, the vendor acknowledges and agrees that CAPI Global 
        reserves the right to select or decline any vendor at its sole discretion and is under no obligation 
        to provide explanations or reasons for such decisions.
      </p>

      <h2 data-translate="vendorBenefitsTitle">Benefits of Registration</h2>
      <ul class="guideline-list">
        <li data-translate="vendorBenefit1">Be considered for future tenders and projects.</li>
        <li data-translate="vendorBenefit2">Build a long-term relationship with CAPI Global.</li>
        <li data-translate="vendorBenefit3">Stay updated with procurement requirements and opportunities.</li>
      </ul>

      <h2 data-translate="vendorContactTitle">Contact Information</h2>
      <p data-translate="vendorContactDesc">
        If you wish to contact the Procurement / Supplier Relationship Management team, 
        please <a href="#" class="link">click here</a> or reach out via the vendor portal.
      </p>

      <h2 data-translate="vendorGuidesTitle">Guides & Reference Documents</h2>
      <ul class="guideline-list">
        <li data-translate="vendorGuide1">CAPI Vendor Registration Guide v1.0</li>
        <li data-translate="vendorGuide2">Vendor Registration Helpdesk</li>
      </ul>
    </section>
    <!-- Register Now Button -->

  </main>
@endsection <!-- End of page content -->
<style>
    h1, h2, h3, h4, h5, h6 {
      text-align: center;
    }
  </style>
<script src="{{ asset('/js/translations.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
