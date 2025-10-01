@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Home') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->
  <main>
    <section class="page-header">
      <div class="container">
        <h1 data-translate="aboutPageTitle">About CAPI Global Company</h1>
        <p class="lead" data-translate="aboutPageSubtitle">Merging Saudi Arabia's architectural heritage with modern engineering—aligned with Vision 2030.</p>
      </div>
      <!-- General Manager's Message -->
<div class="gm-message" style="text-align:center; margin: 50px auto; max-width: 800px;">
  <blockquote 
    style="font-size: 1.25rem; font-style: italic; line-height: 1.6; color: #333; position: relative;" 
    data-translate="gmMessageQuote">
      “At CAPI Global, our core belief is clear: Construction is about far more than structures.  
      We are here to create lasting value, build absolute trust, and confidently deliver a better tomorrow.  
      We are committed to excellence in every project.”
  </blockquote>
  <p style="margin-top: 20px; font-weight: bold; font-size: 1.1rem; color: #222;">
    <span data-translate="gmName">Muhammad Kamal Alreyis</span><br>
    <span data-translate="gmPosition" style="font-weight: normal; font-size: 1rem; color: #555;">General Manager</span>
  </p>
</div>
<!-- End General Manager's Message -->

    </section>

    <section class="container content">
      <h2 data-translate="executiveSummary">Executive Summary</h2>
      <p data-translate="executiveSummaryDesc">
        CAPI Global Company is a visionary Saudi Arabian firm established in 2022 that specializes in preserving traditional regional styles (Najdi, Hijazi, Al-Ahsa, Asiri, Hail, Farasan) while applying contemporary construction and engineering practices to create functional, sustainable, and culturally resonant buildings across the Kingdom.
      </p>

      <h2 data-translate="branchesCoverage">Branches & Coverage</h2>
      <p data-translate="branchesCoverageDesc">Branches: Riyadh · Jeddah · Madinah — Projects across Makkah, Madinah and all over Saudi Arabia.</p>

      <h2 data-translate="ourMission">Our Mission</h2>
      <p data-translate="ourMissionDesc">To preserve cultural heritage through high-quality restoration, and to deliver modern infrastructure that respects local identity while fulfilling contemporary needs.</p>

      

    </section>
  </main>

@endsection <!-- End of page content -->

<script src="{{ asset('/js/translations.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
