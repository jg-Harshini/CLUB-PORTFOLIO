<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e($event->event_name); ?> - Event Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + AOS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #fdf6f6, #fff);
            margin: 0;
        }

        .header {
            background-color: white;
            padding: 10px 30px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header img {
            height: 45px;
            border: 2px solid #800000;
            border-radius: 6px;
            margin-right: 15px;
        }

        .header-title {
            font-weight: bold;
            color: #800000;
            font-size: 1.5rem;
        }

        .event-layout {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            padding: 40px;
            flex-wrap: wrap;
        }

        .event-img {
            flex: 1 1 40%;
            max-width: 500px;
        }

        .event-img img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            object-fit: cover;
        }

        .event-details {
            flex: 1 1 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-right: 10px;
        }

        .event-details h1 {
            font-size: 2.5rem;
            color: #800000;
            font-weight: bold;
        }

        .event-details h4 {
            color: #a04040;
            margin: 10px 0 25px;
            font-weight: 600;
        }

        .event-details p {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: #333;
        }

        .event-details p i {
            color: #800000;
            margin-right: 8px;
        }

        .back-btn {
            margin-top: 30px;
            background-color: #800000;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background-color: #a52a2a;
        }

        footer {
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

        @media (max-width: 768px) {
            .event-layout {
                flex-direction: column;
                padding: 20px;
            }

            .event-img, .event-details {
                flex: 1 1 100%;
                max-width: 100%;
            }

            .event-details h1 {
                font-size: 2rem;
            }
        }
        .img-fluid {
    border: 2px solid #ddd;
    transition: transform 0.3s;
}
.img-fluid:hover {
    transform: scale(1.03);
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

<!-- Main Layout -->
<div class="event-layout">
    <!-- Event Image -->
    <div class="event-img" data-aos="fade-right">
        <img src="<?php echo e(asset('storage/' . ($event->image_path ?? 'img/default.png'))); ?>" alt="<?php echo e($event->event_name); ?>">
    </div>

    <!-- Event Info -->
<div class="event-details" data-aos="fade-left">
    <h1><?php echo e($event->event_name); ?></h1>
    <h4><i class="fas fa-users"></i> <?php echo e($event->club->club_name); ?></h4>
    <p><i class="fas fa-calendar-alt"></i> <strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('F j')); ?> to <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('F j, Y')); ?></p>
    <p><i class="fas fa-clock"></i> <strong>Time:</strong> <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('h:i A')); ?> - <?php echo e(\Carbon\Carbon::parse($event->end_time)->format('h:i A')); ?></p>
    <p><i class="fas fa-align-left"></i> <strong>Description:</strong><br><?php echo e($event->description); ?></p>

    <?php if($event->participants || $event->coordinators || $event->best_performance): ?>
        <div class="mt-4">
            <h5 style="color: #800000;">Key Highlights</h5>
            <div class="d-flex flex-wrap gap-4 mt-3">
                <?php if($event->participants): ?>
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-people-fill text-info" style="font-size: 2rem;"></i>
                    <div>
                        <div class="fw-bold fs-5"><?php echo e($event->participants); ?></div>
                        <div class="text-muted">Participants</div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($event->coordinators): ?>
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-person-check-fill text-danger" style="font-size: 2rem;"></i>
                    <div>
                        <div class="fw-bold fs-5"><?php echo e($event->coordinators); ?></div>
                        <div class="text-muted">Coordinators</div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($event->best_performance): ?>
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-award-fill text-warning" style="font-size: 2rem;"></i>
                    <div>
                        <div class="fw-bold fs-5"><?php echo e($event->best_performance); ?></div>
                        <div class="text-muted">Top Performances</div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

    <?php if($event->winner_name): ?>
    <div class="container mt-4" data-aos="fade-up">
        <h3 style="color: #800000;">🏆 Winner</h3>
        <p><strong><?php echo e($event->winner_name); ?></strong></p>
        <?php if($event->winner_photo): ?>
            <img src="<?php echo e(asset('storage/' . $event->winner_photo)); ?>" alt="Winner Photo" style="max-width: 200px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <?php endif; ?>
    </div>
<?php endif; ?>

<!-- Gallery Section -->
<?php if($event->gallery): ?>
    <?php
        $galleryImages = json_decode($event->gallery, true);
    ?>
    <?php if(is_array($galleryImages) && count($galleryImages)): ?>
        <div class="container mt-5" data-aos="fade-up">
            <h3 style="color: #800000;">📸 Event Gallery</h3>
            <div class="row g-3 mt-3">
                <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <img src="<?php echo e(asset('storage/' . $img)); ?>" class="img-fluid rounded shadow-sm" alt="Gallery Image">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
        <a href="<?php echo e(route('student.events')); ?>" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Events</a>


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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: false });
</script>

</body>
</html>
<?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/student/event-details.blade.php ENDPATH**/ ?>