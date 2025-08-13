<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Explore Clubs at TCE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #ffffff;
      margin: 0;
      padding: 0;
    }

    .club-section {
      padding: 40px 20px;
      text-align: center;
    }

    .club-section h5 {
      color: #063c64;
      font-weight: bold;
      margin-bottom: 10px;
      letter-spacing: 1px;
    }

    .club-section h1 {
      color: #800000;
      font-weight: 700;
      font-size: 2.3rem;
      margin-bottom: 15px;
    }

    .club-section p {
      color: #444;
      font-size: 1rem;
      margin-bottom: 40px;
    }

    .club-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 50px 40px;
      padding: 0 15px;
    }

    .club-card {
      position: relative;
      width: 100%;
      aspect-ratio: 1 / 1;
      background-color: #f8f9fa;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease-in-out;
    }

    .club-card:hover {
      transform: translateY(-8px);
    }

    .club-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease, filter 0.4s ease;
    }

    .club-card:hover img {
      transform: scale(1.1);
      filter: blur(3px) brightness(70%);
    }

    .club-name-overlay {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: #063c64;
      color: white;
      font-weight: bold;
      padding: 10px 0;
      font-size: 1.05rem;
      z-index: 1;
    }

    .club-details {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 75%;
      background-color: rgba(255, 255, 255, 0.97);
      padding: 15px 15px 10px;
      text-align: center;
      opacity: 0;
      transform: translateY(100%);
      transition: all 0.4s ease-in-out;
      z-index: 2;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .club-card:hover .club-details {
      opacity: 1;
      transform: translateY(0%);
    }

    .club-details h5 {
      color: #800000;
      font-weight: 700;
      font-size: 1.05rem;
      margin-bottom: 8px;
    }

    .club-details p {
      font-size: 0.9rem;
      color: #333;
      line-height: 1.3;
      max-height: 60px;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .club-details a {
      padding: 7px 20px;
      background-color: #800000;
      color: white;
      border-radius: 25px;
      font-size: 0.85rem;
      text-decoration: none;
      transition: background-color 0.3s ease;
      align-self: center;
    }

    .club-details a:hover {
      background-color: #a52a2a;
    }

    @media (max-width: 768px) {
      .club-section h1 {
        font-size: 1.7rem;
      }
    }

    @media (max-width: 576px) {
      .club-card {
        aspect-ratio: 4 / 3;
      }
    }
  </style>
</head>
<body>

<!-- Header -->
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

<!-- Clubs Section -->
<div class="container-fluid club-section">
  <h1>Explore the clubs at TCE</h1>
  <p>
    Explore the vibrant student clubs at TCE that spark innovation, leadership, and creativity.<br>
    Join communities that empower you beyond academics through tech, culture, and more.
  </p>

  <div class="club-grid">
    @foreach($clubs as $club)
      <div class="club-card" data-aos="fade-up">
        <img src="{{ asset('storage/' . $club->logo) }}" alt="{{ $club->club_name }}">
        <div class="club-name-overlay">{{ $club->club_name }}</div>
        <div class="club-details">
          <h5>{{ $club->club_name }}</h5>
          <p>{{ \Illuminate\Support\Str::limit($club->introduction, 120) }}</p>
          <a href="{{ route('student.clubs.show', ['id' => $club->id]) }}">Explore More</a>
        </div>
      </div>
    @endforeach
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


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 800, once: true });
</script>

</body>
</html>
