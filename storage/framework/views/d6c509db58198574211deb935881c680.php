<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e($event->event_name); ?> - Event Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + AOS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        <p><i class="fas fa-calendar-alt"></i> <strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($event->date)->format('F j, Y')); ?></p>
        <p><i class="fas fa-clock"></i> <strong>Time:</strong> <?php echo e(\Carbon\Carbon::parse($event->time)->format('g:i A')); ?></p>
        <p><i class="fas fa-align-left"></i> <strong>Description:</strong><br><?php echo e($event->description); ?></p>
        <a href="<?php echo e(route('student.events')); ?>" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Events</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row g-4 px-3 px-md-5">
            <div class="col-md-6 col-lg-4">
                <h4 style="color: #FADADD;">Contact Info</h4>
                <p><i class="fas fa-map-marker-alt me-2"></i>123 College Road, Chennai, India</p>
                <p><i class="fas fa-envelope me-2"></i>info@tce.edu.in</p>
                <p><i class="fas fa-phone me-2"></i>+91 44 1234 5678</p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h4 style="color: #FADADD;">Opening Time</h4>
                <p>Mon - Fri: 9:00 AM to 5:00 PM</p>
                <p>Sat: 9:00 AM to 1:00 PM</p>
                <p>Sun: Closed</p>
            </div>
            <div class="col-md-12 col-lg-4">
                <h4 style="color: #FADADD;">Connect With Us</h4>
                <a href="#"><i class="fab fa-facebook-f me-3"></i></a>
                <a href="#"><i class="fab fa-twitter me-3"></i></a>
                <a href="#"><i class="fab fa-instagram me-3"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <hr class="my-4" style="border-color:  #FADADD;">
        <p class="text-center mb-0">&copy; 2025 TCE College. All Rights Reserved.</p>
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
<?php /**PATH C:\HARSHINI\intern\clubportfolio\resources\views/student/event-details.blade.php ENDPATH**/ ?>