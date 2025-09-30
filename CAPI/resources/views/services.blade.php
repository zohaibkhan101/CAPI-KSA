@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Home') <!-- Page title -->

@section('content')
<main class="service">
  <section class="page-header service-header container">
    <h1 data-translate="servicesPageTitle">Our Services</h1>
    <p class="lead" data-translate="servicesPageSubtitle">
      Comprehensive services across construction, MEP, water features and facilities management.
    </p>
  </section>

  <section class="container service-cards">
    <div class="card">
      <div class="text">
        <h2 data-translate="mudHousesWorks">Mud Houses & Buildings Works</h2>
        <p data-translate="mudHousesWorksDesc">
          Construction, restoration and modernization of heritage mud structures using sustainable, locally sourced materials and traditional craftsmanship.
        </p>
      </div>
      <div class="image">
        <img src="https://images.pexels.com/photos/259588/pexels-photo-259588.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
             alt="Mud Houses & Buildings" />
      </div>
    </div>

    <div class="card alternate">
      <div class="text">
        <h2 data-translate="civilConstructionWorks">Civil & Construction Works</h2>
        <p data-translate="civilConstructionWorksDesc">
          Excavation, concrete, masonry, waterproofing, steel works, finishing, carpentry, roofing, façade and landscaping.
        </p>
      </div>
      <div class="image">
        <img src="https://images.pexels.com/photos/2219024/pexels-photo-2219024.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
             alt="Civil & Construction Works" />
      </div>
    </div>

    <div class="card">
      <div class="text">
        <h2 data-translate="electricalMechanicalWorks">Electrical & Mechanical Engineering Works</h2>
        <p data-translate="electricalMechanicalWorksDesc">
          Design, installation, testing and commissioning of electrical systems, HVAC, plumbing and mechanical installations.
        </p>
      </div>
      <div class="image">
        <img src="https://images.pexels.com/photos/4254168/pexels-photo-4254168.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
             alt="Electrical & Mechanical Engineering Works" />
      </div>
    </div>

    <div class="card alternate">
      <div class="text">
        <h2 data-translate="waterFeaturesWorks">Water Features Works</h2>
        <p data-translate="waterFeaturesWorksDesc">
          Design, supply, installation and refurbishment of fountains and decorative water elements that combine aesthetics and engineering reliability.
        </p>
      </div>
      <div class="image">
        <img src="https://images.pexels.com/photos/912364/pexels-photo-912364.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
             alt="Water Features Works" />
      </div>
    </div>

    <div class="card">
      <div class="text">
        <h2 data-translate="facilitiesManagement">Facilities Management (FM)</h2>
        <p data-translate="facilitiesManagementDesc">
          Hard and soft FM services, preventive & reactive maintenance, CAFM/Maximo-driven reporting and 24/7 helpdesk support.
        </p>
      </div>
      <div class="image">
        <img src="https://images.pexels.com/photos/4483610/pexels-photo-4483610.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
             alt="Facilities Management" />
      </div>
    </div>

    <div class="card alternate">
      <div class="text">
        <h2 data-translate="sustainabilityTechnology">Sustainability, Reporting & Technology</h2>
        <p data-translate="sustainabilityTechnologyDesc">
          PowerBI dashboards, BIM, CAFM systems, and data-driven reporting for operational transparency and continuous improvement.
        </p>
      </div>
      <div class="image">
        <img src="https://images.pexels.com/photos/3861958/pexels-photo-3861958.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
             alt="Sustainability, Reporting & Technology" />
      </div>
    </div>
  </section>
</main>
<style>/* =========================
   Main Service Wrapper
========================= */
.service {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: 100%;
}

/* =========================
   Header
========================= */
.service-header {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 80px 20px;
}

.service-header h1 {
  font-size: 40px;
  color: var(--accent);
  margin-bottom: 18px;
}

.service-header p {
  font-size: 20px;
  color: #797979;
  max-width: 800px; /* keep readable */
  line-height: 1.5;
}

/* =========================
   Container for Cards
========================= */
.service-cards {
  display: flex;
  flex-direction: column;
  gap: 50px;
  margin: auto;
  width: 100%;
  align-items: center; /* center all cards */
}

/* =========================
   Service Card
========================= */
.card {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 30px;
  padding: 50px;
  background-color: var(--white);
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
  text-align: left;

  width: 100%;          /* centered, not full width */
  /* max-width: 800px; */
  margin: 0 auto;      /* center on large screens */
  transition: all 0.3s ease-in-out;
}

/* =========================
   Text Content
========================= */
.card .text {
  flex: 1;
}

.card .text h2 {
  font-size: 32px;
  color: #333;
  margin-bottom: 18px;
}

.card .text p {
  font-size: 16px;
  line-height: 1.6;
  color: #555;
}

/* =========================
   Image Content
========================= */
.card .image {
  flex: 1;
  max-width: 50%;
  text-align: right;
}

.card .image img {
  width: 100%;
  height: auto;
  border-radius: 12px;
  object-fit: cover;
}

/* =========================
   Alternate Layout (flip text/image)
========================= */
.card.alternate {
  flex-direction: row-reverse; /* image left, text right */
}

/* =========================
   Hover Effect
========================= */
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 28px rgba(149, 157, 165, 0.25);
}

/* =========================
   Responsive Design
========================= */
@media (max-width: 1024px) {
  .card {
    width: 100%; /* slightly wider on medium screens */
  }
}

@media (max-width: 768px) {
  .card,
  .card.alternate {
    flex-direction: column;
    text-align: center;
    padding: 30px 20px;
    width: 100%;   /* full width on mobile */
    margin: 0 auto;
  }

  .card .image {
    max-width: 100%;
    text-align: center;
    margin-top: 20px;
  }

  .card .text h2 {
    font-size: 24px;
  }

  .card .text p {
    font-size: 14px;
  }
}
</style>
<script src="{{ asset('/js/translations.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
@endsection
