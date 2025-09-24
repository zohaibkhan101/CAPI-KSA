@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Home') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->
<section class="page-header">
    <div class="container">
        <h1 data-translate="contactUs"></h1>
        <p class="lead" data-translate="contactSubtitle"></p>
    </div>
</section>
    <div class="contact-content container">
        <!-- Contact Info -->
        <div class="contact-info">
            <h3 data-translate="getInTouch">Get in Touch</h3>
            <p><strong data-translate="headquarters">Headquarters:</strong> Jeddah, Saudi Arabia</p>
            <p><strong data-translate="branches">Branches:</strong> Riyadh · Jeddah · Madinah</p>
            <p><strong data-translate="phone">Phone:</strong> +966-50 977 6976</p>
            <p><strong data-translate="email">Email:</strong> info@capi-ksa.com</p>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h3 data-translate="sendMessage">Send Us a Message</h3>
            <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                <label for="name" data-translate="fullName">Full Name</label>
                <input type="text" id="name" name="name" data-placeholder="enterName" placeholder="Enter your name" required />
                
                <label for="email" data-translate="email">Email</label>
                <input type="email" id="email" name="email" data-placeholder="enterEmail" placeholder="Enter your email" required />
                
                <label for="message" data-translate="message">Message</label>
                <textarea id="message" name="message" rows="6" data-placeholder="writeMessage" placeholder="Write your message here" required></textarea>
                
                <div class="form-actions">
                    <button type="submit" class="btn primary" data-translate="send">Send</button>
                    <button type="reset" class="btn ghost" data-translate="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</section>


    <!--js file -->
    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>