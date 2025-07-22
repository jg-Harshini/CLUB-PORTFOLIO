<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Club Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            margin: 20px;
        }
        p {
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Dear <?php echo e($data['name']); ?>,</p>

        <p>
            We are pleased to inform you that your enrollment in the following club(s) has been successfully completed:
            <strong><?php echo e(implode(', ', $data['clubs'])); ?></strong>.
        </p>

        <p>
            Welcome to the vibrant club community at <strong>Thiagarajar College of Engineering</strong>! We look forward to your active participation in the events, activities, and initiatives organized throughout the academic year.
        </p>

        <p>
            Club coordinators will soon share further details regarding orientation sessions, regular meetings, and upcoming events.
        </p>

        <p>
            We wish you a rewarding and enriching experience ahead.
        </p>

        <div class="footer">
            <p>
                Best regards,<br>
                <strong>Clubs Coordination Committee</strong><br>
                Thiagarajar College of Engineering
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/emails/registration_confirmation.blade.php ENDPATH**/ ?>