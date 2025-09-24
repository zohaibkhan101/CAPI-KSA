@extends('layouts.nav')  <!-- This includes header/footer and CSS/JS -->

@section('title', 'Careers') <!-- Page title -->

@section('content')       <!-- Page-specific content starts here -->
<section class="careers-content container">

    <!-- Page Heading -->
    <div class="page-header">
        <h2 data-translate="availableJobs">Available Jobs</h2>
        <p data-translate="careerIntro">Join our team and explore exciting career opportunities.</p>
    </div>

    <!-- Jobs Grid -->
    <div class="jobs-grid">
        @foreach($jobs as $job)
        <div class="job-card">
            <h3>{{ $job->title }}</h3>
            <p><strong>Location:</strong> {{ $job->location ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ $job->type ?? 'N/A' }}</p>
            <p><strong>Deadline:</strong> {{ $job->deadline ?? 'Open' }}</p>

            <!-- Apply Button -->
            <button class="btn primary" onclick="document.getElementById('applyForm-{{ $job->id }}').classList.toggle('hidden')">
                Apply
            </button>

            <!-- Application Form -->
            <div id="applyForm-{{ $job->id }}" class="apply-form hidden">
                <form action="{{ route('jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="name-{{ $job->id }}" data-translate="fullName">Full Name</label>
                    <input type="text" id="name-{{ $job->id }}" name="name" placeholder="Enter your full name" required>

                    <label for="email-{{ $job->id }}" data-translate="email">Email</label>
                    <input type="email" id="email-{{ $job->id }}" name="email" placeholder="Enter your email" required>

                    <label for="phone-{{ $job->id }}" data-translate="phone">Phone</label>
                    <input type="text" id="phone-{{ $job->id }}" name="phone" placeholder="Enter your phone number">

                    <label for="nationality-{{ $job->id }}" data-translate="nationality">Nationality</label>
                    <input type="text" id="nationality-{{ $job->id }}" name="nationality" placeholder="Enter your nationality">

                    <label for="experience-{{ $job->id }}" data-translate="experience">Experience</label>
                    <input type="text" id="experience-{{ $job->id }}" name="experience" placeholder="e.g., 3 years in IT">

                    <label for="education-{{ $job->id }}" data-translate="education">Education</label>
                    <input type="text" id="education-{{ $job->id }}" name="education" placeholder="e.g., Bachelor's in CS">

                    <label for="cv-{{ $job->id }}" data-translate="uploadCV">Upload CV</label>
                    <input type="file" id="cv-{{ $job->id }}" name="cv" accept=".pdf,.doc,.docx">

                    <div class="form-actions">
                        <button type="submit" class="btn primary" data-translate="submit">Submit</button>
                        <button type="reset" class="btn ghost" data-translate="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Optional: Success Message -->
@if(session('success'))
<div class="alert success">
    {{ session('success') }}
</div>
@endif

    <!--js file -->
    <script src="{{ asset('/js/translations.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>