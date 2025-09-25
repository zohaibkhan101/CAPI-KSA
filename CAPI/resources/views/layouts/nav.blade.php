<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap' rel='stylesheet'>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/rtl-styles.css') }}">
    
    <title>CAPI Global</title>
</head>
<body>

<!-- Header -->
<header class="site-header">
    <div class="header-inner">
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo.png') }}" alt="CAPI Global Logo" class="logo" />
            <h2>CAPI GLOBAL</h2>
        </a>

        <button class="nav-toggle" aria-label="Toggle navigation">☰</button>

        <nav class="main-nav">
            <!-- <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" data-translate="home">Home</a> -->
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" data-translate="about">About</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}" data-translate="services">Services</a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}" data-translate="projects">Projects</a>
            <a href="{{ route('vendors') }}" class="{{ request()->routeIs('vendors') ? 'active' : '' }}" data-translate="vendors">Vendors</a>
            <a href="{{ route('careers') }}" class="{{ request()->routeIs('careers') ? 'active' : '' }}" data-translate="careers">Careers</a>
            <a href="{{ route('contact') }}" class="btn btn-primary {{ request()->routeIs('contact') ? 'active' : '' }}" data-translate="contact">Contact</a>
            
        </nav>

        <button class="lang-switch" aria-label="Switch Language">عربي</button>
    </div>
</header>

<!-- Main Content -->
<main>
    @yield('content')
    


</main>
<!-- Chatbot widget containers -->
<div id="chatbot-fab" aria-label="Open chat" title="Chat with us" style="display:none">
    🤖chat
    <span class="sr-only">Open chat</span>
  </div>
<div id="chatbot-panel" role="dialog" aria-modal="true" aria-labelledby="chatbot-title" style="display:none">
  <div class="chatbot-header">
    <div class="chatbot-title" id="chatbot-title">CAPI Assistant</div>
    <button type="button" class="chatbot-close" aria-label="Close chat">×</button>
  </div>
  <div class="chatbot-messages" id="chatbot-messages" aria-live="polite"></div>
  <form class="chatbot-input" id="chatbot-form">
    <input type="text" id="chatbot-text" placeholder="Type your question..." autocomplete="off" aria-label="Message" />
    <button type="submit" class="chatbot-send" aria-label="Send">Send</button>
  </form>
  <div class="chatbot-footer">Powered by a lightweight on-site FAQ bot</div>
  </div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="one">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="CAPI Global Logo" class="logo-image">
                <span>CAPI Global Company</span>
            </div>
            <p><br><span data-translate="trustedPartner">Your trusted partner in construction and design.</span></p>
            <img src="{{ asset('images/vision.png') }}" alt="CAPI Global Logo" class="logo-vision">
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
                <li><a href="{{ route('home') }}" data-translate="home">Home</a></li>
                <li><a href="{{ route('services') }}" data-translate="services">Services</a></li>
                <li><a href="{{ route('projects') }}" data-translate="projects">Projects</a></li>
                <li><a href="{{ route('about') }}" data-translate="testimony">Testimony</a></li>
                <li><a href="{{ route('contact') }}" data-translate="contact">Contact</a></li>
            </ul>
        </div>

        <div class="three">
            <h3 data-translate="headOffice">Head Office</h3>
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

        <div class="four">
            <h3 data-translate="contactInfo">Contact</h3>
            <p>info@capi-ksa.com</p>
            <p>+966-509776976</p>
        </div>
    </div>
    <div id="chatbot-fab" aria-label="Open chat" title="Chat with us" style="display:none">
    🤖chat
    <span class="sr-only">Open chat</span>
  </div>
<div id="chatbot-panel" role="dialog" aria-modal="true" aria-labelledby="chatbot-title" style="display:none">
  <div class="chatbot-header">
    <div class="chatbot-title" id="chatbot-title">CAPI Assistant</div>
    <button type="button" class="chatbot-close" aria-label="Close chat">×</button>
  </div>
  <div class="chatbot-messages" id="chatbot-messages" aria-live="polite"></div>
  <form class="chatbot-input" id="chatbot-form">
    <input type="text" id="chatbot-text" placeholder="Type your question..." autocomplete="off" aria-label="Message" />
    <button type="submit" class="chatbot-send" aria-label="Send">Send</button>
  </form>
  <div class="chatbot-footer">Powered by a lightweight on-site FAQ bot</div>
  </div>
</footer>


<!-- JS -->
<script src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>
</body>
</html>
