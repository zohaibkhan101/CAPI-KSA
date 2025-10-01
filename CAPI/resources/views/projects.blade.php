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
    <img src="images/project images/landscaping1.jpg" alt="Landscaping">
    <h3 data-translate="project1Title">Landscaping</h3>
    <p data-translate="project1Client">Client: Zaid Alhussain Brothers & Group</p>
    <p data-translate="project1Scope">Scope of Work: Landscaping, Finishing.</p>
    <p data-translate="project1Value">Project Value: 1M+.</p>
  </div>

  <div class="card">
    <img src="images/project images/comercial.jpg" alt="Commercial Fit-out">
    <h3 data-translate="project2Title">Sadeeq Alkhair Mosque</h3>
    <p data-translate="project2Client">Client: Attar United</p>
    <p data-translate="project2Scope">Scope of Work: Wood Works, Finishing.</p>
    <p data-translate="project2Value">Project Value: 1M+.</p>
  </div>

  <div class="card">
    <img src="images/project images/hvac3.png" alt="Water Feature Installation">
    <h3 data-translate="project3Title">Basketball Court</h3>
    <p data-translate="project3Client">Client: Private Farm Al Mahdia</p>
    <p data-translate="project3Scope">Scope of Work: Civil, MEP, Finishing.</p>
    <p data-translate="project3Value">Project Value: 1M+.</p>
  </div>
    </section>
  </main>


    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
