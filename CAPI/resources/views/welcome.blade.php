<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.png') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/rtl-styles.css') }}">
    <title>CAPI Global</title>
</head>
<body>
    <header class="site-header">
    <div class="header-inner">
      <a href="index.html" class="brand">
        <img src="{{ asset('/images/logo.png') }}" alt="CAPI Global Logo" class="logo" />
        <h2>CAPI GLOBAL</h2>
      </a>
      <button class="nav-toggle" aria-label="Toggle navigation">
      ☰
    </button>
      <nav class="main-nav">
        <a href="index.html" data-translate="home">Dashboard</a>
        <a href="about.html" data-translate="about">About</a>
        <a href="services.html" data-translate="services">Services</a>
        <a href="projects.html" data-translate="projects">Projects</a>
        <a href="contact.html" class="btn btn-primary" data-translate="contact">Contact</a>
      </nav>
      <button class="lang-switch" aria-label="Switch Language">Arabic</button>
    </div>
  </header>
    <!-- hero Section
    <section class="hero">
         Background Video 
        <video autoplay muted loop playsinline class="hero-video">
          <source src="images/hero.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      
        Hero Content 
        <div class="hero-content">
          <h4>CAPI Global Company</h4>
          <h1>Preserving Saudi Heritage</h1>
          <h1>Building the Future.</h1>
          <div class="cta">
            <a href="#" class="btn primary">Learn More</a>
            <a href="./contact.html" class="btn ghost">Get Quote</a>
          </div>
        </div>
      </section> -->
      <!-- Hero Section -->
<section class="hero">
  <div class="slideshow">
    <img src="images/hero/najdi ai 1.png" class="active"alt="Slide 11">
    <img src="images/hero/najdi ppt 1.png" alt="Slide 12">
    <img src="images/hero/hijazi ai 1.png" alt="Slide 9">
    <img src="images/hero/slide2.png" alt="Slide 2">
    <img src="images/hero/hail ai 1.png" alt="Slide 7">
    <img src="images/hero/slide3.png" alt="Slide 3">
    <img src="images/hero/farasan1.jpg" alt="Slide 6">
    <img src="images/hero/najdi2.jpg" alt="Slide 13">
    <img src="images/hero/najdi3.jpg" alt="Slide 14">
    <img src="images/hero/hijazi pp1 1.png" alt="Slide 10">
    <img src="images/hero/slide1.png"  alt="Slide 1">
    <img src="images/hero/hail ppt 1.png" alt="Slide 8">
    <img src="images/hero/farasan ppt 1.png" alt="Slide 5">
    <!-- <img src="images/hero/asiri ppt 1.png" alt="Slide 4"> -->
 
  </div>

  <div class="hero-content">
    <h4 data-translate="companyName">CAPI Global Company</h4>
    <h1 data-translate="heroTitle1">Preserving Saudi Heritage</h1>
    <h1 data-translate="heroTitle2">Building the Future</h1>
    <div class="cta">
            <a href="./about.html" class="btn primary" data-translate="learnMore">Learn More</a>
            <a href="./contact.html" class="btn ghost" data-translate="getQuote">Get Quote</a>
          </div>
  </div>
</section>

<section class="why-capi">
    <div class="container about-container">
        <h4 data-translate="aboutUs">ABOUT US</h4>
        <p data-translate="aboutDescription">
            CAPI is a leading Saudi architecture company dedicated to blending cultural heritage with modern design. 
            In line with Saudi Arabia's Vision 2030, we specialize in integrating traditional Najdi, Alahsa, and Alhejaz 
            architectural styles with innovative, contemporary solutions. Our goal is to deliver unique architectural 
            finishes that preserve the Kingdom's historical richness while embracing modern functionality. With a 
            strong focus on creativity, quality, and authenticity, CAPI is committed to becoming a top name in the 
            Saudi construction and architecture industry, leaving a lasting legacy through designs that seamlessly 
            connect the past with the future.
        </p>
        <ul>
            <li data-translate="alignment">Alignment with Vision 2030</li>
            <li data-translate="integratedServices">Integrated Services</li>
            <li data-translate="skilledTeam">Skilled Team</li>
            <li data-translate="sustainability">Sustainability & QHSE</li>
        </ul>
    </div>
</section>
 <!-- Quick Stats Section -->
    <section class="quick-stats">
  <div class="container">
    <!-- <h4>Quick Stats</h4> -->
    <div class="stats">
      <div class="stat">
        <h3 data-target="2022">0</h3>
        <p data-translate="founded">Founded</p>
      </div>
      <div class="stat">
        <h3 data-translate="riyadhJeddahMadinah">Riyadh  Jeddah  Madinah</h3>
        <p data-translate="branches">Branches</p>
      </div>
      <div class="stat">
        <h3 data-translate="20" data-target="20">0</h3>
        <p data-translate="projects">Projects</p>
      </div>
      <div class="stat">
        <h3 data-translate="saudiArabia">Saudi Arabia</h3>
        <p data-translate="coverage">Coverage</p>
      </div>
    </div>
  </div>
</section>
    <!-- service section -->
    <section class="service">
        <header class="service-header container">
            <div>
                <h4 data-translate="ourServices">Our Services</h4>
                <h2 data-translate="servicesSubtitle">Combining heritage craftsmanship with modern techniques.</h2>
            </div>
        </header>
        <div class="service-cards container">
            <div class="card">
                <i class="bx bx-home-alt-2 bx-lg"></i> <!-- Icon for Mud Houses -->
                <h3 data-translate="mudHouses">Mud Houses & Buildings</h3>
                <p data-translate="mudHousesDesc">Construction, restoration and modernization of heritage mud structures with sustainable local materials.</p>
                <a href="./services.html" class="btn primary" data-translate="knowMore">Know More</a>
            </div>
            <div class="card">
                <i class="bx bx-building-house bx-lg"></i> <!-- Icon for Civil & Construction Works -->
                <h3 data-translate="civilWorks">Civil & Construction Works</h3>
                <p data-translate="civilWorksDesc">Excavation, masonry, concrete, infrastructure and finishing for residential and commercial projects.</p>
                <a href="./services.html" class="btn primary" data-translate="knowMore">Know More</a>
            </div>
            <div class="card">
                <i class="bx bx-cog bx-lg"></i> <!-- Icon for Electrical & Mechanical Works -->
                <h3 data-translate="electricalMechanical">Electrical & Mechanical Works</h3>
                <p data-translate="electricalMechanicalDesc">Turnkey MEP solutions for hospitals, airports, data centers and hospitality sectors.</p>
                <a href="./services.html" class="btn primary" data-translate="knowMore">Know More</a>
            </div>
            <div class="card">
                <i class="bx bx-water bx-lg"></i> <!-- Icon for Water Features -->
                <h3 data-translate="waterFeatures">Water Features</h3>
                <p data-translate="waterFeaturesDesc">Design, installation and refurbishment of fountains and decorative water systems.</p>
                <a href="./services.html" class="btn primary" data-translate="knowMore">Know More</a>
            </div>
        </div>
    </section>

   
     

    <!-- Featured Projects Section -->
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
            
        </div>
        <div style="text-align: center;">
  <a href="./projects.html" class="btn primary" 
     style="display: inline-block; 
            padding: 12px 30px; 
            background-color: #AA6C39; 
            margin-top: 20px;
            color: #fff; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold;"
     data-translate="moreProjects">
    More Projects
  </a>
</div>
    </section>

    <!-- Why CAPI Section -->
    

    <!-- Newsletter section
    <section class="newsletter">
        <div class="container">
            <div class="left-content">
                <h3>Please Subscribe to the Newsletter for the best service possible</h3>
            </div>
            <div class="right-content">
                <form>
                    <h4>Subscribe to our newsletter</h4>
                    <div>
                        <input type="text" id="search">
                        <button>Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </section> -->

    <!-- about Section -->
    <section class="about">
        <header class="about-header container">
            <div>
                <h4 data-translate="gallery">Gallery</h4>
                <!-- <h2>Learn Who We are</h2> -->
            </div>
        </header>
        
    </section>
<section class="project-gallery">
  <div class="slideshow-container">
    <div class="slideshow-track">
      <div class="slide"><img src="images/project images/facade1.jpg" alt="Facade 1"></div>
      <div class="slide"><img src="images/project images/finishing2.jpg" alt="Finishing 2"></div>
      <div class="slide"><img src="images/project images/fitout1.jpg" alt="Fitout 1"></div>
      <div class="slide"><img src="images/project images/hvac1.png" alt="HVAC 1"></div>
      <!-- <div class="slide"><img src="images/project images/basketball1.jpeg" alt="Basketball 1"></div>
      <div class="slide"><img src="images/project images/basketball2.jpeg" alt="Basketball 2"></div>
      <div class="slide"><img src="images/project images/basketball3.jpeg" alt="Basketball 3"></div>
      <div class="slide"><img src="images/project images/basketball4.jpeg" alt="Basketball 4"></div>
      <div class="slide"><img src="images/project images/basketball5.jpeg" alt="Basketball 5"></div> -->

      <div class="slide"><img src="images/project images/comercial.jpg" alt="Commercial"></div>

      
      <div class="slide"><img src="images/project images/facade2.jpg" alt="Facade 2"></div>
      <div class="slide"><img src="images/project images/facade3.jpg" alt="Facade 3"></div>

      
      <div class="slide"><img src="images/project images/finishing3.jpg" alt="Finishing 3"></div>
      <div class="slide"><img src="images/project images/finishinh1.jpg" alt="Finishing 1"></div>

      
      <div class="slide"><img src="images/project images/fitout2.jpg" alt="Fitout 2"></div>
      <div class="slide"><img src="images/project images/fitout3.jpg" alt="Fitout 3"></div>
      <div class="slide"><img src="images/project images/fitout4.jpg" alt="Fitout 4"></div>
      <div class="slide"><img src="images/project images/fitout5.jpg" alt="Fitout 5"></div>
      <div class="slide"><img src="images/project images/fitout6.jpg" alt="Fitout 6"></div>

      
      <div class="slide"><img src="images/project images/hvac2.png" alt="HVAC 2"></div>
      <div class="slide"><img src="images/project images/hvac3.png" alt="HVAC 3"></div>
      <div class="slide"><img src="images/project images/hvac4.png" alt="HVAC 4"></div>
      <div class="slide"><img src="images/project images/hvac5.png" alt="HVAC 5"></div>

      <div class="slide"><img src="images/project images/landscaping1.jpg" alt="Landscaping 1"></div>
      <div class="slide"><img src="images/project images/landscaping2.jpg" alt="Landscaping 2"></div>
      <div class="slide"><img src="images/project images/landscaping3.jpg" alt="Landscaping 3"></div>

      <div class="slide"><img src="images/project images/mep1.jpg" alt="MEP 1"></div>
      <div class="slide"><img src="images/project images/mep2.jpg" alt="MEP 2"></div>
      <div class="slide"><img src="images/project images/mep3.jpg" alt="MEP 3"></div>
      <div class="slide"><img src="images/project images/mep4.jpg" alt="MEP 4"></div>

      <div class="slide"><img src="images/project images/woodworks1.jpg" alt="Woodworks 1"></div>
      <div class="slide"><img src="images/project images/woodworks2.jpg" alt="Woodworks 2"></div>
      <div class="slide"><img src="images/project images/woodworks3.jpg" alt="Woodworks 3"></div>

      <!-- keep adding your images here -->
    </div>
  </div>
</section>
    <footer>
        <div class="container">
            <div class="one">
                <div class="logo">
                    <img src="{{ asset('/images/logo.png') }}" alt="CAPI Global Logo" class="logo-image">
                    <span>CAPI Global Company</span>
                    
                    
                   
                </div>
                <p><br><span data-translate="trustedPartner">Your trusted partner in construction and design.</span></p>
                <img src="images/vision.png" alt="CAPI Global Logo" class="logo-vision">
                <div class="icons">
                    <a href="https://www.facebook.com/profile.php?id=61580083493663"><i class="bx bxl-facebook-circle bx-sm"></i></a>
                    <a href="https://x.com/CapiGlobalKSA"><i class="bx bxl-twitter bx-sm"></i></a>
                    <a href="https://www.linkedin.com/company/capi-global/"><i class="bx bxl-linkedin bx-sm"></i></a>
                    <a href="https://www.instagram.com/capi_global_company/"><i class="bx bxl-instagram bx-sm"></i></a>
                </div>
            </div>
            <div class="two">
                <h3 data-translate="links">Links</h3>
                <ul>
                    <li><a href="./index.html" data-translate="home">Dashboard</a></li>
                    <li><a href="./services.html" data-translate="services">Services</a></li>
                    <li><a href="./projects.html" data-translate="projects">Projects</a></li>
                    <li><a href="./about.html" data-translate="testimony">Testimony</a></li>
                    <li><a href="./contact.html" data-translate="contact">Contact</a></li>
                </ul>
            </div>
            <div class="three">
                <h3 data-translate="headOffice">Head Office</h3>
                <div>
                    <p>Said Ibn Zaqar, Aziziyah, Jeddah, Saudi Arabia</p>
                    <p>+966-509776976</p>
                    <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.887392739676!2d39.1773278!3d21.551258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d1b4a7f479a3%3A0xeee9f46268c4409b!2sCAPI%20GLOBAL%20COMPANY%20LTD.!5e0!3m2!1sen!2ssa!4v1758198858397!5m2!1sen!2ssa" 
                    width="400" 
                    height="200" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div> 
            </div>
            <div class="four">
                <h3 data-translate="contactInfo">Contact</h3>
                <div>
                    <p>info@capi-ksa.com</p>
                    <p>+966-509776976</p>
                </div>
            </div>
        </div>
    </footer>


    <!--js file -->
    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>