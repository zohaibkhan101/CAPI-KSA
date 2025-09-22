@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Home') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->

  <main>
    <section class="projects">
        <header class="projects-header container">
            <h4 data-translate="featuredProjects">Featured Projects</h4>
            <!-- <h2>Our Recent Work</h2> -->
        </header>
        <div class="project-cards container">
            <div class="card">
                <img src="images/project images/basketball4.jpeg" alt="Heritage Mud Restoration">
                <h3 data-translate="basketballCourt">Basketball Court Construction </h3>
                <p data-translate="basketballCourtDesc">Complete basketball court construction including foundation, flooring, markings, and finishing for optimal gameplay.</p>
            </div>
            <div class="card">
                <img src="images/project images/comercial.jpg" alt="Commercial Fit-out">
                <h3 data-translate="commercialFitout">Commercial Fit-out</h3>
                <p data-translate="commercialFitoutDesc">Transforming commercial spaces with modern designs and efficient layouts.</p>
            </div>
            <div class="card">
                <img src="images/project images/hvac3.png" alt="Water Feature Installation">
                <h3 data-translate="mepWorks">MEP Works</h3>
                <p data-translate="mepWorksDesc">Powering projects with smart MEP solutions for seamless operations.</p>
            </div>
            <div class="card">
    <img src="images/project images/landscaping1.jpg" alt="Landscaping">
    <h3 data-translate="landscaping">Landscaping</h3>
    <p data-translate="landscapingDesc">Professional landscaping services including gardens, lawns, outdoor features, and hardscape elements to enhance aesthetics.</p>
</div>

<div class="card">
    <img src="images/project images/woodworks2.jpg" alt="Woodworks">
    <h3 data-translate="woodworks">Woodworks</h3>
    <p data-translate="woodworksDesc">Custom woodwork solutions including furniture, paneling, cabinetry, and decorative finishes to complement interior designs.</p>
</div>

<div class="card">
    <img src="images/project images/finishing2.jpg" alt="Finishing">
    <h3 data-translate="finishing">Finishing</h3>
    <p data-translate="finishingDesc">High-quality finishing services including painting, plastering, tiling, and final touches for polished project completion.</p>
</div>
        </div>
        <div style="text-align: center;">
  
</div>
    </section>
  </main>


    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
