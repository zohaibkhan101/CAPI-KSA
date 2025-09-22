@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Home') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->

  <main>
    <section class="page-header">
      <div class="container"><h1 data-translate="servicesPageTitle">Our Services</h1><p class="lead" data-translate="servicesPageSubtitle">Comprehensive services across construction, MEP, water features and facilities management.</p></div>
    </section>

    <section class="container content">
      <article>
        <h2 data-translate="mudHousesWorks">Mud Houses & Buildings Works</h2>
        <!-- <img src="images/services/mud-houses.jpg" alt="Mud Houses & Buildings" class="service-image" /> -->
        <p data-translate="mudHousesWorksDesc">Construction, restoration and modernization of heritage mud structures using sustainable, locally sourced materials and traditional craftsmanship.</p>
      </article>

      <article>
        <h2 data-translate="civilConstructionWorks">Civil & Construction Works</h2>
        <!-- <img src="images/services/civil-construction.jpg" alt="Civil & Construction Works" class="service-image" /> -->
        <p data-translate="civilConstructionWorksDesc">Excavation, concrete, masonry, waterproofing, steel works, finishing, carpentry, roofing, façade and landscaping.</p>
      </article>

      <article>
        <h2 data-translate="electricalMechanicalWorks">Electrical & Mechanical Engineering Works</h2>
        <!-- <img src="images/services/electrical-mechanical.jpg" alt="Electrical & Mechanical Engineering Works" class="service-image" /> -->
        <p data-translate="electricalMechanicalWorksDesc">Design, installation, testing and commissioning of electrical systems, HVAC, plumbing and mechanical installations.</p>
      </article>

      <article>
        <h2 data-translate="waterFeaturesWorks">Water Features Works</h2>
        <!-- <img src="images/services/water-features.jpg" alt="Water Features Works" class="service-image" /> -->
        <p data-translate="waterFeaturesWorksDesc">Design, supply, installation and refurbishment of fountains and decorative water elements that combine aesthetics and engineering reliability.</p>
      </article>

      <article>
        <h2 data-translate="facilitiesManagement">Facilities Management (FM)</h2>
        <!-- <img src="images/services/facilities-management.jpg" alt="Facilities Management" class="service-image" /> -->
        <p data-translate="facilitiesManagementDesc">Hard and soft FM services, preventive & reactive maintenance, CAFM/Maximo-driven reporting and 24/7 helpdesk support.</p>
      </article>

      <article>
        <h2 data-translate="sustainabilityTechnology">Sustainability, Reporting & Technology</h2>
        <!-- <img src="images/services/sustainability-technology.jpg" alt="Sustainability, Reporting & Technology" class="service-image" /> -->
        <p data-translate="sustainabilityTechnologyDesc">PowerBI dashboards, BIM, CAFM systems, and data-driven reporting for operational transparency and continuous improvement.</p>
      </article>
    </section>
  </main>

 

    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
