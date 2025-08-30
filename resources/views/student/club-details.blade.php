<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $club->club_name }} | Club Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap, AOS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 0;
        }

        .back-btn {
            background-color: #800000;
            color: white !important;
            padding: 12px 32px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 1rem;
            text-decoration: none !important;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            box-shadow: 0 0 10px rgba(128, 0, 0, 0.3);
        }

        .back-btn:hover {
            background-color: #600000;
            transform: scale(1.05);
            color: #fff !important;
        }

        .event-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
            margin-bottom: 20px;
        }

        .event-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        footer {
            width: 100%;
            background-color: #800000;
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            color: #ccc;
        }
    </style>
</head>
<body>

<!-- Static Header -->
<div style="width: 100%; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <div class="container d-flex align-items-center justify-content-between py-3">
        <a href="index.html" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo" style="height: 60px;">
        </a>
        <div style="display: flex; gap: 40px;">
            <a href="{{ route('student.index') }}" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
            </a>
            <a href="{{ route('student.commitee') }}" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#W91G11; width:36px; height:36px;"></i><br>Commitee
                </a>
            <a href="{{ route('student.clubs.all') }}" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                <i data-feather="users" style="stroke:#E76F51; width:36px; height:36px;"></i><br>Clubs
            </a>
            <a href="{{ route('student.events') }}" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                <i data-feather="calendar" style="stroke:#E9C46A; width:36px; height:36px;"></i><br>Events
            </a>
            <a href="{{ route('student.enroll.form') }}" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                <i data-feather="edit-3" style="stroke:#F4A261; width:36px; height:36px;"></i><br>Enroll
            </a>
        </div>
    </div>
</div>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>feather.replace()</script>

<!-- Main Content -->
<div class="p-4" style="max-height: 100vh; overflow-y: auto; background-color: #f8f9fc;">
    <div class="container-fluid">
        <div class="card shadow-lg rounded-4 p-5 border-0 bg-white">

            {{-- Club Header --}}
            <div class="row align-items-center mb-5">
                @if ($club->logo)
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <img src="{{ asset('storage/' . $club->logo) }}" alt="Club Logo"
                             class="img-fluid rounded shadow-sm border"
                             style="max-height: 150px; object-fit: contain;">
                    </div>
                @endif
                <div class="col-md-9">
                    <h2 class="fw-bold" style="color: #003366;">{{ $club->club_name }}</h2>
                    <p class="text-muted"><strong>Founded:</strong> {{ $club->year_started }}</p>
                    <p class="mt-3">{{ $club->introduction ?? '—' }}</p>

                    <h5 class="fw-semibold mt-4" style="color: #003366;">Mission</h5>
                    <p>{{ $club->mission ?? '—' }}</p>
                </div>
            </div>

            <hr class="my-4">

            {{-- Staff Coordinators --}}
            <div class="row mb-5">
                <h4 class="fw-semibold mb-4" style="color: #003366;">Staff Coordinators</h4>

                {{-- Staff Coordinator 1 --}}
                <div class="col-auto me-4 mb-3">
                    @if($club->staff_coordinator_photo)
                        <img src="{{ asset('storage/' . $club->staff_coordinator_photo) }}"
                             alt="Staff Coordinator 1"
                             class="rounded-circle mb-2"
                             width="100" height="100"
                             style="object-fit: cover;">
                    @endif
                    <h6 class="mb-1">{{ $club->staff_coordinator_name ?? '—' }}</h6>
                    <p class="mb-0 text-muted">
                        <i class="bi bi-envelope"></i> {{ $club->staff_coordinator_email ?? '—' }}
                    </p>
                </div>

                {{-- Staff Coordinator 2 --}}
                @if($club->staff_coordinator2_name || $club->staff_coordinator2_email || $club->staff_coordinator2_photo)
                    <div class="col-auto mb-3">
                        @if($club->staff_coordinator2_photo)
                            <img src="{{ asset('storage/' . $club->staff_coordinator2_photo) }}"
                                 alt="Staff Coordinator 2"
                                 class="rounded-circle mb-2"
                                 width="100" height="100"
                                 style="object-fit: cover;">
                        @endif
                        <h6 class="mb-1">{{ $club->staff_coordinator2_name ?? '—' }}</h6>
                        <p class="mb-0 text-muted">
                            <i class="bi bi-envelope"></i> {{ $club->staff_coordinator2_email ?? '—' }}
                        </p>
                    </div>
                @endif
            </div>

            <hr class="my-4">

            {{-- Student Coordinators --}}
            <div class="mb-5">
                <h4 class="fw-semibold mb-4" style="color: #003366;">Student Coordinators</h4>
                <div class="row">
                    @forelse ($club->studentCoordinators as $student)
                        <div class="col-md-6 col-12 mb-3">
                            <p class="fw-medium text-dark mb-0">{{ $student->name }}</p>
                        </div>
                    @empty
                        <div class="text-muted">No student coordinators listed.</div>
                    @endforelse
                </div>
            </div>

            <hr class="my-4">

            {{-- Events Section --}}
            <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-semibold mb-0" style="color: #003366;">Club Events</h4>
                </div>

                @if($club->events && $club->events->count())
                    <div class="row">
                        @foreach($club->events as $event)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <a href="{{ route('student.event.details', $event->id) }}" style="text-decoration: none; color: inherit;">
                                    <div class="event-card h-100">
                                        @if($event->image_path)
                                            <img src="{{ asset('storage/' . $event->image_path) }}"
                                                 alt="Event Image"
                                                 class="img-fluid rounded mb-3"
                                                 style="width: 100%; height: 200px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded mb-3 d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <h5 class="fw-bold mb-2" style="color: #003366;">{{ $event->event_name }}</h5>
                                        <p class="text-muted mb-2">{{ $event->description }}</p>
                                        <small class="text-muted">
                                            <i class="bi bi-calendar me-1"></i>
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('F j') }} to {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }}
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            <i class="bi bi-clock me-1"></i>
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                        </small>
                                        @if(!empty($event->chief_guest) && $event->chief_guest !== 'NA')
                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    <strong>Chief Guest:</strong> {{ $event->chief_guest }}
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-muted">No events right now. Stay tuned!</p>
                @endif
            </div>

            <!-- Back Button -->
            <div class="text-center mt-5 mb-4">
                <a href="{{ route('student.clubs.all') }}" class="back-btn">← Back to All Clubs</a>
            </div>

        </div>
    </div>
</div>
<!-- Footer Start -->
<footer style="background-color: #800000; color: white; padding: 15px 0; font-size: 14px;">
  <div class="container px-3">

    <div class="row g-4 text-center text-md-start align-items-start">

      <!-- Contact Us -->
      <div class="col-md-4">
        <h6 class="mb-2" style="color: white; font-weight:700;">Contact Us</h6>
        <p class="mb-3">
          <span style="font-weight:700; color:white;">Principal</span><br>
          <span style="font-weight:600; color:white;">Dr. L. Ashok Kumar</span><br>
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="mailto:principal@tce.edu" 
             style="color: #ff9999; text-decoration:none;" 
             onmouseover="this.style.textDecoration='underline'" 
             onmouseout="this.style.textDecoration='none'">
             principal@tce.edu
          </a>
        </p>
        <p class="mb-0">
          <span style="font-weight:700; color:white;">Dean - Student Affairs</span><br>
          <span style="font-weight:600; color:white;">Dr. G. Balaji</span><br>
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="mailto:gbarch@tce.edu" 
             style="color: #ff9999; text-decoration:none;" 
             onmouseover="this.style.textDecoration='underline'" 
             onmouseout="this.style.textDecoration='none'">
             gbarch@tce.edu
          </a>
        </p>
        <p class="mb-0">
          <span style="font-weight:700; color:white;">College level co-ordinator</span><br>
          <span style="font-weight:600; color:white;">Dr. P. Ramkumar</span><br>
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="mailto:prrchem@tce.edu" 
             style="color: #ff9999; text-decoration:none;" 
             onmouseover="this.style.textDecoration='underline'" 
             onmouseout="this.style.textDecoration='none'">
             prrchem@tce.edu
          </a>
        </p>
      </div>

      <!-- Developed By -->
      <div class="col-md-4">
        <h6 class="mb-2" style="color: white; font-weight:700;">Developed By</h6>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Aburvaa A S</span></p>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Harshini J G</span></p>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Kiruthika B</span></p>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Nikitha A S</span></p>
        <p class="mb-2"><span style="font-weight:700; color:#ff9999;">Varshini C</span></p>

        <p class="mt-2 mb-1" style="color:white; font-weight:700;">Department of Information Technology</p>
<p class="mb-0" style="color:white; line-height:1.6;">
  With Guidance from 
  <span style="font-weight:600; color:#ff9999;">Dr. C. Deisy</span>, Head of Department, 
  <span style="font-weight:600; color:#ff9999;">Dr. K. V. Uma</span>, Assistant Professor, 
  <span style="font-weight:600; color:#ff9999;">Mrs. A. Indirani</span>, Assistant Professor
</p>

      </div>

      <!-- Google Map -->
      <div class="col-md-4">
        <h6 class="mb-2" style="color: white; font-weight:700;">Our Location</h6>
        <div class="ratio ratio-16x9 rounded" style="height: 120px; overflow: hidden;">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15722.598045886074!2d78.07186475545656!3d9.87974334043231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c58f98cfb84d%3A0x29f51efea3e84bf2!2sThiagarajar%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1753094148686!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>
    </div>

    <!-- Social & PDF Download -->
    <div class="row mt-3 text-center">
      <div class="col">
        <h6 class="mb-2" style="color: white; font-weight:700;">Connect With Us</h6>
        <a href="https://www.facebook.com/TheOfficialTCEPage" class="me-2" style="color: white;"><i class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/tce_madurai/" class="me-2" style="color: white;"><i class="fab fa-instagram"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-linkedin-in"></i></a>

        <!-- PDF Download -->
        <div class="mt-2">
          <a href="{{ asset('assets/MANUAL.pdf') }}" download class="btn btn-outline-light btn-sm py-1 px-2" style="font-size: 12px;">
            <i class="fas fa-file-pdf me-1"></i> Download Student Manual
          </a>
        </div>
      </div>
    </div>

    <hr class="my-2" style="border-color: #B34747;">
    <div class="text-center small" style="font-size: 12px;">
      &copy; 2025 TCE College. All Rights Reserved.
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: false, mirror: true });
</script>
</body>
</html>