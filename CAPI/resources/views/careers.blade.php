@extends('layouts.nav')

@section('title', 'Careers')

@section('content')
<main>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 data-translate="availableJobs">Available Jobs</h1>
            <p class="lead" data-translate="careerIntro">Join our team and explore exciting career opportunities.</p>
        </div>
    </section>

    <!-- Jobs Section -->
    <section class="container content">
        @foreach($jobs as $job)
        <article class="job-card">
            <h2>{{ $job->title }}</h2>
            <p class="job-desc">{{ $job->description }}</p>
            <p><strong>Location:</strong> {{ $job->location ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ $job->type ?? 'N/A' }}</p>
            <p><strong>Deadline:</strong> {{ $job->deadline ?? 'Open' }}</p>

            <button class="btn primary" onclick="openModal({{ $job->id }})" style="margin-top: 15px;">
                Apply Now
            </button>

            <!-- Modal Form -->
            <div id="applyModal-{{ $job->id }}" class="modal hidden">
                <div class="modal-container">
                    <span class="close" onclick="closeModal({{ $job->id }})">&times;</span>
                    <h2>Apply for {{ $job->title }}</h2>

                    <form action="{{ route('jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="modal-form">
                        @csrf
                        <div class="form-grid">
                            <div>
                                <label for="name-{{ $job->id }}">Full Name</label>
                                <input type="text" id="name-{{ $job->id }}" name="name" required>
                            </div>
                            <div>
                                <label for="email-{{ $job->id }}">Email</label>
                                <input type="email" id="email-{{ $job->id }}" name="email" required>
                            </div>
                            <div>
                                <label for="phone-{{ $job->id }}">Phone</label>
                                <input type="text" id="phone-{{ $job->id }}" name="phone">
                            </div>
                            <div>
                                <label for="nationality-{{ $job->id }}">Nationality</label>
                                <input type="text" id="nationality-{{ $job->id }}" name="nationality">
                            </div>
                            <div>
                                <label for="experience-{{ $job->id }}">Experience</label>
                                <input type="text" id="experience-{{ $job->id }}" name="experience">
                            </div>
                            <div>
                                <label for="education-{{ $job->id }}">Education</label>
                                <input type="text" id="education-{{ $job->id }}" name="education">
                            </div>
                            <div>
                                <label for="cv-{{ $job->id }}">Upload CV</label>
                                <input type="file" id="cv-{{ $job->id }}" name="cv" accept=".pdf,.doc,.docx">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn primary">Submit</button>
                            <button type="reset" class="btn ghost">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </article>
        @endforeach
    </section>
</main>

@if(session('success'))
<div class="alert success">
    {{ session('success') }}
</div>
@endif

<!-- Themed Modal Styles -->
<style>
/* Modal Overlay */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(20, 20, 20, 0.85); /* Dark semi-transparent */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    font-family: var(--font-family, 'Inter', sans-serif); /* Match site font */
}

/* Modal Content Container */
.modal-container {
    background: var(--bgcolor, #fff); /* Match page background */
    color: var(--text-color, #333);
    padding: 40px;
    border-radius: 1rem;
    max-width: 650px;
    width: 95%;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    position: relative;
    animation: fadeIn 0.3s ease-in-out;
}

/* Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: var(--accent, #AA6C39);
    cursor: pointer;
    transition: 0.3s;
}
.close:hover {
    color: var(--primary-color, #AA6C39);
}

/* Grid Form Layout */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 20px;
}
.form-grid div {
    display: flex;
    flex-direction: column;
}
.form-grid input[type="text"],
.form-grid input[type="email"],
.form-grid input[type="file"] {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-family: inherit;
    font-size: 1rem;
}

/* Form Actions */
.form-actions {
    margin-top: 25px;
    display: flex;
    gap: 15px;
}
.modal-form button.btn.primary {
    background-color: var(--primary-color, #AA6C39);
    color: #fff;
}
.modal-form button.btn.ghost {
    background: transparent;
    border: 1px solid var(--primary-color, #AA6C39);
    color: var(--primary-color, #AA6C39);
}

/* Fade In Animation */
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(-20px);}
    to {opacity: 1; transform: translateY(0);}
}

.hidden { display: none; }

/* Job card spacing like services page */
.job-card {
    margin-bottom: 50px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
}
</style>

<!-- Modal Scripts -->
<script>
function openModal(id) {
    document.getElementById('applyModal-' + id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById('applyModal-' + id).classList.add('hidden');
}
</script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '{{ config('app.primary_color', '#AA6C39') }}'
        });
    @endif

    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            html: '{!! implode("<br>", $errors->all()) !!}',
            confirmButtonColor: '{{ config('app.primary_color', '#AA6C39') }}'
        });
    @endif
</script>

<script src="{{ asset('/js/translations.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
@endsection
