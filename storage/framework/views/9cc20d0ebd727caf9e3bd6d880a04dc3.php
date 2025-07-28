<!DOCTYPE html>
<html>
<head>
    <title>Student Registrations</title>
    <style>
@page {
    margin: 10px; /* You can reduce further if needed */
}

body {
    font-family: Arial, sans-serif;
    font-size: 12px;
    margin: 0; /* Remove browser default body margin */
    padding: 0;
}


        .header {
            text-align: center;
        }

        .header img {
            height: 80px;
            width: 400px;
        }

        h2 {
            text-align: center;
           text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?php echo e(public_path('/img/tce.jpg')); ?>" alt="Logo">
<h2 class="text-center fw-bold">
<?php if($filterType === 'club'): ?>
  Student Registrations for <?php echo e($filterValue); ?> Club
<?php elseif($filterType === 'dept'): ?>
  Student Registrations for <?php echo e($filterValue); ?> Department
<?php elseif($filterType === 'both'): ?>
  Student Registrations for <?php echo e($filterValue['club']); ?> Club, <?php echo e($filterValue['dept']); ?> Department
<?php else: ?>
  Overall Student Enrollment
<?php endif; ?>

</h2>


    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Email</th>

                <?php if(!in_array($filterType, ['dept', 'both'])): ?>
                    <th>Department</th>
                <?php endif; ?>

                <?php if(!in_array($filterType, ['club', 'both'])): ?>
                    <th>Clubs</th>
                <?php endif; ?>

                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($s->id); ?></td>
                    <td><?php echo e($s->name); ?></td>
                    <td><?php echo e($s->roll_no); ?></td>
                    <td><?php echo e($s->email); ?></td>

                    <?php if(!in_array($filterType, ['dept', 'both'])): ?>
                        <td><?php echo e($s->department); ?></td>
                    <?php endif; ?>

                    <?php if(!in_array($filterType, ['club', 'both'])): ?>
                        <td>
                            <?php $__currentLoopData = $s->clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($club->club_name); ?><?php if(!$loop->last): ?>, <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    <?php endif; ?>

                    <td><?php echo e($s->created_at->format('d-m-Y H:i')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/pdf/enrollments.blade.php ENDPATH**/ ?>