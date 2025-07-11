<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Club Enrollment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('<?php echo e(asset('img/clg1.jpg')); ?>') no-repeat center center fixed;
            background-size: cover;
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, 0.3);
            z-index: -1;
        }

        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
            padding: 10px 0;
        }

        .nav-item {
            text-align: center;
            color: #333;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-item:hover {
            color: #0d6efd;
        }

        .form-wrapper {
            margin-top: 120px;
        }

        .container-form {
            max-width: 720px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.96);
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
        }

        label {
            margin-top: 15px;
            font-weight: 500;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 10px;
        }

        .form-check-label {
            cursor: pointer;
        }

        button {
            background: #5a9bd3;
            color: white;
            border: none;
            padding: 12px 20px;
            margin-top: 25px;
            width: 100%;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
.alert-box-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 60px;
}

.alert-box {
    background-color: #fff3cd;
    color: #856404;
    padding: 20px 40px;
    border: 2px solid #ffeeba;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    max-width: 700px;
    text-align: center;
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
}

        button:hover {
            background: #417cb9;
        }

        @media (max-width: 768px) {
            .container-form {
                margin: 20px;
            }

            .navbar-custom .container {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    </div>
    <!-- Normal Header (static) -->
    <div style="
  width: 100%;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  /* NO position: fixed or sticky */
  height: max-content;
">
        <div class="container d-flex align-items-center justify-content-between py-3">

            <!-- Logo -->
            <a href="<?php echo e(route('student.index')); ?>"class="d-flex align-items-center text-decoration-none">
                <img src="<?php echo e(asset('img/logo.jpg')); ?>" alt="Logo" style="height: 60px;">
            </a>

            <!-- Navigation Links -->
            <div style="display: flex; gap: 40px;">
                <a href="<?php echo e(route('student.index')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
                </a>
                <a href="about.html" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#E76F51; width:36px; height:36px;"></i><br>Clubs
                </a>
                <a href="<?php echo e(route('student.events')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="calendar" style="stroke:#E9C46A; width:36px; height:36px;"></i><br>Events
                </a>
                <a href="<?php echo e(route('student.enroll.form')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="edit-3" style="stroke:#F4A261; width:36px; height:36px;"></i><br>Enroll
                </a>
                

            </div>

        </div>
    </div>


   <?php if(session('popup_message')): ?>
<div id="customAlert" style="position: fixed; top: 0; left: 0; height: 100vh; width: 100vw; background: rgba(0,0,0,0.4); z-index: 2000; display: flex; justify-content: center; align-items: center;">
    <div style="background: white; padding: 30px 40px; border-radius: 15px; text-align: center; max-width: 500px; box-shadow: 0 8px 30px rgba(0,0,0,0.3);">
        <h4 style="margin-bottom: 20px;"><?php echo e(session('popup_message')); ?></h4>
        <button onclick="handleAlertClose()" style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 8px;">OK</button>
    </div>
</div>

<script>
    function handleAlertClose() {
        const redirectTo = "<?php echo e(session('redirect_to')); ?>";
        if (redirectTo === 'home') {
            window.location.href = "<?php echo e(route('student.index')); ?>";
        } else {
            document.getElementById('customAlert').style.display = 'none';
        }
    }
</script>
<?php endif; ?>




    <!-- Enrollment Form -->
    <div class="container-form form-wrapper">
        <h2>Enroll Club</h2>

       
       <form action="<?php echo e(route('student.enroll.submit')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

    <?php echo csrf_field(); ?>

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>

    <div class="row">
        <div class="col-md-6">
            <label>Roll Number:</label>
            <input type="text" name="roll_no" maxlength="6" class="form-control" value="<?php echo e(old('roll_no')); ?>" required>
        </div>
        <div class="col-md-6">
            <label>Phone Number:</label>
            <input type="tel" name="phone" pattern="[0-9]{10}" maxlength="10" class="form-control" value="<?php echo e(old('phone')); ?>" required>
        </div>
    </div>

    <label>Email:</label>
    <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>

    <label>Photo:</label>
    <input type="file" name="photo" class="form-control" accept="image/*" required>

    <label>Department:</label>
    <select name="department" class="form-select" required>
        <option value="" disabled selected>Select your department</option>
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($dept); ?>" <?php echo e(old('department') == $dept ? 'selected' : ''); ?>><?php echo e($dept); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label>Select up to 3 Clubs:</label>
    <div class="checkbox-group">
        <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label class="form-check-label">
                <input type="checkbox" name="clubs[]" value="<?php echo e($club->id); ?>" class="form-check-input club-checkbox"
                    <?php echo e(is_array(old('clubs')) && in_array($club->id, old('clubs')) ? 'checked' : ''); ?>>
                <?php echo e($club->club_name); ?>

            </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button type="submit">Submit</button>
</form>
<?php if(session('success')): ?>
<script>
    setTimeout(() => {
        window.location.href = "<?php echo e(route('student.index')); ?>";
    }, 5000);
</script>
<?php endif; ?>

    </div>

    <!-- JS -->
    <script>
        document.querySelectorAll('.club-checkbox').forEach(chk => {
            chk.addEventListener('change', () => {
                const selected = document.querySelectorAll('.club-checkbox:checked');
                if (selected.length > 3) {
                    chk.checked = false;
                    alert('You can only select 3 clubs.');
                }
            });
        });
        feather.replace();
    </script>
</body>
</html>
<?php /**PATH C:\HARSHINI\intern\clubportfolio\resources\views/student/enroll.blade.php ENDPATH**/ ?>