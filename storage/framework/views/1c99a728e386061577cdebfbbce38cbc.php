<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($club->club_name); ?> | Club Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap, AOS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .club-header {
            background-color: #800000;
            color: white;
            padding: 70px 0 40px;
            text-align: center;
        }

        .club-logo {
            max-height: 220px;
            border-radius: 18px;
            background-color: white;
            padding: 10px;
            border: 4px solid #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }

        .section {
            background-color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 30px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.05);
            transition: transform 0.4s ease;
        }

        .section:hover {
            transform: scale(1.01);
        }

        .divider {
            height: 4px;
            width: 80px;
            background-color: #800000;
            margin: 20px auto;
            border-radius: 3px;
        }

        .staff-photo {
            width: 180px;
            border-radius: 15px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .staff-photo:hover {
            transform: scale(1.07) rotate(1.5deg);
        }

        .event-card {
            background-color: #f8f9fa;
            border-left: 6px solid #063c64;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            transition: all 0.4s ease;
        }

        .event-card:hover {
            transform: scale(1.01);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .founded-badge {
            background-color: #800000;
            color: white;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
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
            <img src="<?php echo e(asset('img/logo.jpg')); ?>" alt="Logo" style="height: 60px;">
        </a>
        <div style="display: flex; gap: 40px;">
            <a href="<?php echo e(route('student.index')); ?>" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
            </a>
            <a href="<?php echo e(route('student.commitee')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#W91G11; width:36px; height:36px;"></i><br>Commitee
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

<!-- Club Header -->
<div class="club-header" data-aos="fade-down">
    <div class="container">
        <h1 class="display-4"><?php echo e($club->club_name); ?></h1>
        <?php if($club->logo): ?>
            <img src="<?php echo e(asset('storage/' . $club->logo)); ?>" alt="<?php echo e($club->club_name); ?> Logo" class="club-logo" data-aos="zoom-in" data-aos-delay="200">
        <?php endif; ?>
    </div>
</div>

<!-- Main Content -->
<div class="container my-5">
    <!-- Introduction -->
    <div class="section" data-aos="fade-up">
        <h3 class="text-center"><i class="bi bi-info-circle-fill me-2"></i>Introduction</h3>
        <div class="divider"></div>
        <p class="text-center"><?php echo e($club->introduction); ?></p>
    </div>

    <!-- Mission -->
    <div class="section" data-aos="fade-up" data-aos-delay="100">
        <h3 class="text-center"><i class="bi bi-lightbulb-fill me-2"></i>Our Mission</h3>
        <div class="divider"></div>
        <p class="text-center"><?php echo e($club->mission ?? 'Mission not available.'); ?></p>
    </div>

    <!-- Staff Coordinator -->
    <div class="section row align-items-center" data-aos="fade-right" data-aos-delay="150">
        <!--div class="col-md-4 text-center">
            <?php if($club->staff_coordinator_photo): ?>
                <img src="<?php echo e(asset('storage/' . $club->staff_coordinator_photo)); ?>" alt="Coordinator Photo" class="staff-photo">
            <?php endif; ?>
        </div-->
        <div class="col-md-8 mt-4 mt-md-0">
            <h3><i class="bi bi-person-badge-fill me-2"></i>Staff Coordinator</h3>
            <div class="divider ms-0 me-auto"></div>
            <p><strong>Name:</strong> <?php echo e($club->staff_coordinator_name); ?></p>
            <p><strong>Email:</strong> <a href="mailto:<?php echo e($club->staff_coordinator_email); ?>"><?php echo e($club->staff_coordinator_email); ?></a></p>
        </div>
    </div>

    <!-- Founded Year -->
    <div class="section d-flex justify-content-between align-items-center" data-aos="zoom-in" data-aos-delay="200">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-calendar-event fs-3 text-danger"></i>
            <h5 class="mb-0">Founded</h5>
        </div>
        <span class="founded-badge"><?php echo e($club->year_started); ?></span>
    </div>

    <!-- Events -->
    <div class="section" data-aos="fade-up" data-aos-delay="300">
        <h3 class="text-center"><i class="bi bi-megaphone-fill me-2"></i>Events</h3>
        <div class="divider mx-auto"></div>
        <?php if($club->events && $club->events->count()): ?>
            <?php $__currentLoopData = $club->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('student.event.details', $event->id)); ?>" style="text-decoration: none; color: inherit;">
        <div class="event-card">
            <h5 style="color:#800000;"><?php echo e($event->title); ?></h5>
            <p><?php echo e($event->event_name); ?></p>
            <small class="text-muted">📅 <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y')); ?></small>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-center">No events right now. Stay tuned!</p>
        <?php endif; ?>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-5 mb-4">
        <a href="<?php echo e(route('student.clubs.all')); ?>" class="back-btn">← Back to All Clubs</a>
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
          <a href="<?php echo e(asset('assets\MANUAL.pdf')); ?>" download class="btn btn-outline-light btn-sm py-1 px-2" style="font-size: 12px;">
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
<?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/student/club-details.blade.php ENDPATH**/ ?>