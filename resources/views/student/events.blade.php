<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .section-title {
            max-width: 900px;
            margin: 0 auto 3rem;
            text-align: center;
        }

        .section-title .sub-style {
            display: inline-block;
            position: relative;
            margin-bottom: 1rem;
        }

        .section-title .sub-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #0056d2;
            text-transform: uppercase;
            position: relative;
            z-index: 2;
            background-color: #f0f4fa;
            padding: 0 1rem;
        }

        .section-title .sub-style::before,
        .section-title .sub-style::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 50px;
            height: 2px;
            background-color: #d72638;
            transform: translateY(-50%);
        }

        .section-title .sub-style::before {
            left: -60px;
        }

        .section-title .sub-style::after {
            right: -60px;
        }

        .section-title h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #002855;
            margin-bottom: 1rem;
        }

        .event-card {
            position: relative;
            width: 100%;
            padding-top: 85%;
            overflow: hidden;
            border-radius: 15px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            background-color: #f0f0f0;
        }

        .event-card:hover {
            transform: scale(1.02);
        }

        .event-card img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .event-overlay {
            position: absolute;
            bottom: -100%;
            left: 0;
            right: 0;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 15px;
            transition: bottom 0.4s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            border-radius: 15px;
        }

        .event-card:hover .event-overlay {
            bottom: 0;
        }
    </style>
</head>
<body>

<!-- Static Header -->
<div style="width: 100%; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <div class="container d-flex align-items-center justify-content-between py-3">
        <a href="{{ route('student.index') }}" class="d-flex align-items-center text-decoration-none">
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
            <a href="{{ route('student.clubs.all') }}"  class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
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

<!-- Training Section Start -->
<div class="container-fluid training overflow-hidden bg-light py-3">
    <div class="container py-3">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <div class="sub-style" data-aos="fade-up" data-aos-delay="100">
                <h5 class="sub-title text-primary px-3">OUR EVENTS</h5>
            </div>
            <h1 class="display-5 mb-4" data-aos="fade-up" data-aos-delay="200">Driving Innovation Through Engaging Events</h1>
        </div>

        <!-- Filter -->
        <form method="GET" action="{{ route('student.events') }}" class="mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <label for="club_id" class="col-form-label">Filter by Club:</label>
                </div>
                <div class="col-auto">
                    <select name="club_id" id="club_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Clubs</option>
                        @foreach ($clubs as $club)
                            <option value="{{ $club->id }}" {{ $clubId == $club->id ? 'selected' : '' }}>
                                {{ $club->club_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        

        <!-- Upcoming Events -->
        <h4 class="text-success mb-3" data-aos="fade-up" data-aos-delay="400">Upcoming Events</h4>
        <div class="row gx-4 gy-4">
            @forelse ($upcoming as $event)
                <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('student.event.details', $event->id) }}" class="text-decoration-none">
                        <div class="event-card">
                            <img src="{{ asset('storage/' . $event->image_path ?? 'img/default.png') }}" alt="Event Image">
                            <div class="event-overlay">
                                <h5>{{ $event->event_name }}</h5>
                                <p class="mb-0"><strong>Date:</strong>{{ \Carbon\Carbon::parse($event->start_date)->format('F j ') }} to {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }}</p>
                                <p class="mb-0"><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-muted">No upcoming events found.</p>
            @endforelse
        </div>

        <!-- Completed Events -->
        <h4 class="text-secondary mt-5 mb-3" data-aos="fade-up" data-aos-delay="400">Completed Events</h4>
        <div class="row gx-4 gy-4">
            @forelse ($completed as $event)
                <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('student.event.details', $event->id) }}" class="text-decoration-none">
                        <div class="event-card">
                            <img src="{{ asset('storage/' . $event->image_path ?? 'img/default.png') }}" alt="Event Image">
                            <div class="event-overlay">
                                <h5>{{ $event->event_name }}</h5>
                                <p class="mb-0"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }} to {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</p>
                                <p class="mb-0"><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-muted">No completed events found.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Footer Start -->
<footer style="background-color: #800000; color: white; padding: 10px 0; font-size: 14px;">
  <div class="container px-3">

    <div class="row g-3 text-center text-md-start align-items-start">

      <!-- Contact Info -->
      <div class="col-md-4">
        <h6 class="mb-1" style="color: #ff9999;">Contact Info</h6>
        <p class="mb-1">
          <i class="fa fa-map-marker-alt me-2" style="color: #ff9999;"></i>
          V3JJ+VJ3, Thiruparankundram, TamilNadu 625015
        </p>
        <p class="mb-1">
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="https://www.tce.edu" style="color: white; text-decoration: none;">www.tce.edu</a>
        </p>
        <p class="mb-0">
          <i class="fas fa-phone me-2" style="color: #ff9999;"></i>
          +91 452 2482240
        </p>
      </div>

      <!-- Developed By -->
      <div class="col-md-4">
        <h6 class="mb-1" style="color: #ff9999;">Developed By</h6>
        <p class="mb-1">Aburvaa A S, Harshini J G</p>
        <p class="mb-1">Kiruthika B, Nikitha A S, Varshini C</p>
        <p class="mb-0">3rd Year IT Department,Thiagarajar College of Engineering.</p>
      </div>

      <!-- Google Map -->
      <div class="col-md-4">
        <h6 class="mb-1" style="color: #ff9999;">Our Location</h6>
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
        <h6 class="mb-2" style="color: #ff9999;">Connect With Us</h6>
        <a href="https://www.facebook.com/TheOfficialTCEPage" class="me-2" style="color: white;"><i class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/tce_madurai/" class="me-2" style="color: white;"><i class="fab fa-instagram"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-linkedin-in"></i></a>

        <!-- PDF Download -->
        <div class="mt-2">
          <a href="{{ asset('assets\MANUAL.pdf') }}" download class="btn btn-outline-light btn-sm py-1 px-2" style="font-size: 12px;">
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


                 <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    once: false,
    duration: 1000,
    easing: 'ease-in-out'
  });
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
