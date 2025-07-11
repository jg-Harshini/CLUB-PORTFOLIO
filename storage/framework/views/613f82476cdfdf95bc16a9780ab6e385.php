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
        <a href="<?php echo e(route('student.index')); ?>" class="d-flex align-items-center text-decoration-none">
            <img src="<?php echo e(asset('img/logo.jpg')); ?>" alt="Logo" style="height: 60px;">
        </a>
        <div style="display: flex; gap: 40px;">
            <a href="<?php echo e(route('student.index')); ?>" class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
            </a>
            <a href="<?php echo e(route('student.clubs.all')); ?>"  class="nav-item" style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
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
        <form method="GET" action="<?php echo e(route('student.events')); ?>" class="mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <label for="club_id" class="col-form-label">Filter by Club:</label>
                </div>
                <div class="col-auto">
                    <select name="club_id" id="club_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Clubs</option>
                        <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($club->id); ?>" <?php echo e($clubId == $club->id ? 'selected' : ''); ?>>
                                <?php echo e($club->club_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </form>

        

        <!-- Upcoming Events -->
        <h4 class="text-success mb-3" data-aos="fade-up" data-aos-delay="400">Upcoming Events</h4>
        <div class="row gx-4 gy-4">
            <?php $__empty_1 = true; $__currentLoopData = $upcoming; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="<?php echo e(route('student.event.details', $event->id)); ?>" class="text-decoration-none">
                        <div class="event-card">
                            <img src="<?php echo e(asset('storage/' . $event->image_path ?? 'img/default.png')); ?>" alt="Event Image">
                            <div class="event-overlay">
                                <h5><?php echo e($event->event_name); ?></h5>
                                <p class="mb-0"><strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($event->date)->format('F j, Y')); ?></p>
                                <p class="mb-0"><strong>Time:</strong> <?php echo e(\Carbon\Carbon::parse($event->time)->format('g:i A')); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted">No upcoming events found.</p>
            <?php endif; ?>
        </div>

        <!-- Completed Events -->
        <h4 class="text-secondary mt-5 mb-3" data-aos="fade-up" data-aos-delay="400">Completed Events</h4>
        <div class="row gx-4 gy-4">
            <?php $__empty_1 = true; $__currentLoopData = $completed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="<?php echo e(route('student.event.details', $event->id)); ?>" class="text-decoration-none">
                        <div class="event-card">
                            <img src="<?php echo e(asset('storage/' . $event->image_path ?? 'img/default.png')); ?>" alt="Event Image">
                            <div class="event-overlay">
                                <h5><?php echo e($event->event_name); ?></h5>
                                <p class="mb-0"><strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($event->date)->format('F j, Y')); ?></p>
                                <p class="mb-0"><strong>Time:</strong> <?php echo e(\Carbon\Carbon::parse($event->time)->format('g:i A')); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted">No completed events found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Footer Start -->
                <div class="container-fluid" style="background-color: #800000; color: white; padding: 40px 0;">
                    <div class="container">
                        <div class="row g-4">
                            <!-- Contact Info -->
                            <div class="col-md-6 col-lg-4">
                                <h4 style="color: #B34747; margin-bottom: 20px;">Contact Info</h4>
                                <p><i class="fa fa-map-marker-alt me-2" style="color: #B34747;"></i>123 College Road,
                                    Chennai, India
                                </p>
                                <p><i class="fas fa-envelope me-2" style="color: #B34747;"></i>info@tce.edu.in</p>
                                <p><i class="fas fa-phone me-2" style="color: #B34747;"></i>+91 44 1234 5678</p>
                            </div>

                            <!-- Opening Time -->
                            <div class="col-md-6 col-lg-4">
                                <h4 style="color: #B34747; margin-bottom: 20px;">Opening Time</h4>
                                <p>Monday - Friday: 9:00 AM to 5:00 PM</p>
                                <p>Saturday: 9:00 AM to 1:00 PM</p>
                                <p>Sunday: Closed</p>
                            </div>

                            <!-- Social Media -->
                            <div class="col-md-12 col-lg-4 d-flex flex-column">
                                <h4 style="color: #B34747; margin-bottom: 20px;">Connect With Us</h4>
                                <div>
                                    <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="#" style="color: white; font-size: 1.5rem;"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: #B34747; margin: 30px 0;">
                        <div class="text-center" style="color: white; font-size: 0.9rem;">
                            &copy; 2025 TCE College. All Rights Reserved.
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
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
<?php /**PATH C:\HARSHINI\intern\clubportfolio\resources\views/student/events.blade.php ENDPATH**/ ?>