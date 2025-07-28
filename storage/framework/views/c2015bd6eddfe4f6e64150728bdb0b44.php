<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOD Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #00264d;
            color: white;
            flex-shrink: 0;
        }

        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #003366;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f4f6f8;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h4 class="text-center">HOD Panel</h4>
        <hr>

        <a href="<?php echo e(route('hod.dashboard')); ?>">🏠 Dashboard</a>
            <a href="<?php echo e(route('hod.clubs')); ?>">📚 View Clubs</a> 
            <a href="<?php echo e(route('hod.enrollments')); ?>">📝 Enrollments</a>

        <!-- 🔒 Logout -->
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/layout/hod.blade.php ENDPATH**/ ?>