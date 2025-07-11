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
      <img src="<?php echo e(asset('img/logo.jpg')); ?>" alt="Logo" style="height: 60px;">
    </a>
    <div style="display: flex; gap: 40px;">
      <a href="<?php echo e(route('student.index')); ?>" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
        <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
      </a>
      <a href="<?php echo e(route('student.clubs.all')); ?>" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
        <i data-feather="users" style="stroke:#E76F51; width:36px; height:36px;"></i><br>Clubs
      </a>
      <a href="<?php echo e(route('student.events')); ?>" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
        <i data-feather="calendar" style="stroke:#E9C46A; width:36px; height:36px;"></i><br>Events
      </a>
      <a href="<?php echo e(route('student.enroll.form')); ?>" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
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
  <h5>CLUBS</h5>
  <h1>Explore the clubs at TCE</h1>
  <p>
    Explore the vibrant student clubs at TCE that spark innovation, leadership, and creativity.<br>
    Join communities that empower you beyond academics through tech, culture, and more.
  </p>

  <div class="club-grid">
    <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="club-card" data-aos="fade-up">
        <img src="<?php echo e(asset('storage/' . $club->logo)); ?>" alt="<?php echo e($club->club_name); ?>">
        <div class="club-name-overlay"><?php echo e($club->club_name); ?></div>
        <div class="club-details">
          <h5><?php echo e($club->club_name); ?></h5>
          <p><?php echo e(\Illuminate\Support\Str::limit($club->introduction, 120)); ?></p>
          <a href="<?php echo e(route('student.clubs.show', ['id' => $club->id])); ?>">Explore More</a>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

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
      <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></a>
      <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="fab fa-twitter"></i></a>
      <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
      <a href="#" style="color: white; font-size: 1.5rem;"><i class="fab fa-linkedin-in"></i></a>
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
<script>
  AOS.init({ duration: 800, once: true });
</script>

</body>
</html>
<?php /**PATH C:\HARSHINI\intern\clubportfolio\resources\views/student/clubs.blade.php ENDPATH**/ ?>