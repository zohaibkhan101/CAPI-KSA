@extends('layouts.app')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Home') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->
  <main>
    <section class="page-header">
      <div class="container">
        <h1 data-translate="aboutPageTitle">About CAPI Global Company</h1>
        <p class="lead" data-translate="aboutPageSubtitle">Merging Saudi Arabia's architectural heritage with modern engineering—aligned with Vision 2030.</p>
      </div>
    </section>

    <section class="container content">
      <h2 data-translate="executiveSummary">Executive Summary</h2>
      <p data-translate="executiveSummaryDesc">CAPI Global Company is a visionary Saudi Arabian firm established in 2022 that specializes in preserving traditional regional styles (Najdi, Hijazi, Al-Ahsa, Asiri, Hail, Farasan) while applying contemporary construction and engineering practices to create functional, sustainable, and culturally resonant buildings across the Kingdom.</p>

      <h2 data-translate="branchesCoverage">Branches & Coverage</h2>
      <p data-translate="branchesCoverageDesc">Branches: Riyadh · Jeddah · Madinah — Projects across Makkah, Madinah and all over Saudi Arabia.</p>

      <h2 data-translate="ourMission">Our Mission</h2>
      <p data-translate="ourMissionDesc">To preserve cultural heritage through high-quality restoration, and to deliver modern infrastructure that respects local identity while fulfilling contemporary needs.</p>

      <h2 data-translate="leadership">Leadership</h2>
      <ul class="leadership">
        <li data-translate="engTamer"><strong>Eng. Tamer Bashouri</strong> — Project Manager (Fit-out Works)</li>
        <li data-translate="engZakriyah"><strong>Eng. Zakriyah Sharfo</strong> — Project Manager (Civil Works)</li>
        <li data-translate="msKhhulud"><strong>Ms. Khhulud Al-Otaybi</strong> — Human Resources Manager</li>
        <!-- <li><strong>Mr. Mohammad Shehryar Khan</strong> — Accounts Manager</li> -->
      </ul>
    </section>
  </main>

  @endsection <!-- End of page content -->

    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
