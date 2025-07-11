<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Committee - TCE clubs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f6f9ff;
    }

    .section-title h1{
      text-align: center;
      padding: 60px 0 30px;
      color: #800000;
      font-weight: 700;
      font-size: 2.3rem;
      margin-bottom: 15px;
    }

    .team-member {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .team-member:hover {
      transform: translateY(-5px);
    }

    .team-member img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .member-info {
      padding: 20px;
      text-align: center;
    }

    .member-info h5 {
      margin: 0;
      font-weight: 600;
      color: #333;
    }

    .member-info span {
      font-size: 0.9rem;
      color: #777;
    }

    .social a {
      color: #333;
      font-size: 1.2rem;
      margin: 0 8px;
      transition: color 0.3s;
    }

    .social a:hover {
      color: #007bff;
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
<!-- Team Section -->
<section id="team" class="py-1">
      <div class="section-title">
      <h1>Our Committee</h1>
    </div>
  <div class="container">


    <div class="row g-4">
      <?php
      $team_members = [
        ['img' => 'principal.jpg', 'name' => 'Dr. L Ashok Kumar, Principal', 'role' => 'Patron'],
        ['img' => 'balaji.jpg', 'name' => 'Dr. G.Balaji , Dean ', 'role' => 'Convener'],
        ['img' => 'ramkumar.jpg', 'name' => 'Dr.Ram Kumar,College level co-ordinator', 'role' => 'Chief Patron'],
        ['img' => 'cdcse.jpeg', 'name' => 'Dr. C.Deisy, Professor & Head,IT', 'role' => 'Convener'],
        ['img' => 'kvuit.jpg', 'name' => 'Dr. K.V.Uma, Professor, IT', 'role' => 'Organizing Secretary'],
        ['img' => 'indirani.jpg', 'name' => 'Mrs.A.Indirani, Professor', 'role' => 'Organizing Secretary'],
      ];
      foreach ($team_members as $member): ?>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="team-member">
            <img src="{{ asset('img/' . $member['img']) }}" alt="{{ $member['name'] }}">
            <div class="member-info">
              <h5><?php echo $member['name']; ?></h5>
              <span><?php echo $member['role']; ?></span>
              <div class="social mt-2">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Footer -->
<div class="container-fluid" style="background-color: #800000; color: white; padding: 40px 0;">
  <div class="row g-4 px-5">
    <div class="col-md-6 col-lg-4">
      <h4 style="color: #B34747; margin-bottom: 20px;">Contact Info</h4>
      <p>123 College Road, Chennai, India</p>
      <p>info@tce.edu.in</p>
      <p>+91 44 1234 5678</p>
    </div>
    <div class="col-md-6 col-lg-4">
      <h4 style="color: #B34747; margin-bottom: 20px;">Opening Time</h4>
      <p>Monday - Friday: 9:00 AM to 5:00 PM</p>
      <p>Saturday: 9:00 AM to 1:00 PM</p>
      <p>Sunday: Closed</p>
    </div>
    <div class="col-md-12 col-lg-4">
      <h4 style="color: #B34747; margin-bottom: 20px;">Connect With Us</h4>
      <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="bi bi-facebook"></i></a>
      <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="bi bi-twitter"></i></a>
      <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="bi bi-instagram"></i></a>
      <a href="#" style="color: white; font-size: 1.5rem;"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
  <hr style="border-color: #B34747; margin: 30px 5%;">
  <div class="text-center" style="color: white; font-size: 0.9rem;">
    &copy; 2025 TCE College. All Rights Reserved.
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
