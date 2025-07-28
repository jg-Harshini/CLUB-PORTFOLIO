<style>
    .dropdown-item.text-danger {
        background-color: transparent !important;
    }

    .dropdown-item.text-danger:hover,
    .dropdown-item.text-danger:focus {
        background-color: transparent !important;
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h2>View Clubs</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success mt-3">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="mb-3 text-end">
            <a href="<?php echo e(route('superadmin.clubs', ['action' => 'create'])); ?>" class="btn btn-primary">
                + Add New Club
            </a>
        </div>

        <table class="table table-bordered bg-white mt-4">
            <thead>
                <tr>
                    <th>Club Name</th>
                    <th>Staff Coordinator</th>
                    <th>Year of Start</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($club->club_name); ?></td>
                    <td><?php echo e($club->staff_coordinator_name); ?></td>
                    <td><?php echo e($club->year_started); ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                Options
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" 
                                       href="<?php echo e(route('superadmin.clubs', ['action' => 'edit', 'id' => $club->id])); ?>">
                                        ✏️ Edit
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" 
                                       href="<?php echo e(route('superadmin.clubs', ['action' => 'profile', 'id' => $club->id])); ?>">
                                        👁️ View Profile
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" 
                                          action="<?php echo e(route('superadmin.clubs', ['action' => 'delete', 'id' => $club->id])); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?> 
                                        <button class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                            ❌ Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/clubs/index.blade.php ENDPATH**/ ?>