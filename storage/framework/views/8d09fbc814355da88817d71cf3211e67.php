<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3 class="mb-4">Clubs in <?php echo e($department); ?> Department</h3>

    <?php if($clubs->count()): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Club Name</th>
                    <th>Coordinator</th>
                    <th>Year of Start</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($club->club_name); ?></td>
                        <td><?php echo e($club->staff_coordinator_name ?? 'N/A'); ?></td> <!-- adjust if relationship used -->
                        <td><?php echo e($club->year_started ?? 'N/A'); ?></td>
                        <td>
                            <a href="<?php echo e(route('hod.clubs.show', $club->id)); ?>" class="btn btn-info">View</a>


                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No clubs found.</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.hod', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/hod/clubs.blade.php ENDPATH**/ ?>