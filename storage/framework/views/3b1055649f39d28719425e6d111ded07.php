<?php $__env->startSection('content'); ?>
<div class="p-4" style="max-height: 100vh; overflow-y: auto; background-color: #f8f9fc;">
    <div class="container-fluid">
        <div class="card shadow-lg rounded-4 p-5 border-0 bg-white">

            
            <div class="row align-items-center mb-5">
                <?php if($club->logo): ?>
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <img src="<?php echo e(asset('storage/' . $club->logo)); ?>" alt="Club Logo"
                             class="img-fluid rounded shadow-sm border"
                             style="max-height: 150px; object-fit: contain;">
                    </div>
                <?php endif; ?>
                <div class="col-md-9">
                    <h2 class="fw-bold" style="color: #003366;"><?php echo e($club->club_name); ?></h2>
                    <p class="text-muted"><strong>Founded:</strong> <?php echo e($club->year_started); ?></p>
                    <p class="mt-3"><?php echo e($club->introduction ?? '—'); ?></p>

                    <h5 class="fw-semibold mt-4" style="color: #003366;">Mission</h5>
                    <p><?php echo e($club->mission ?? '—'); ?></p>
                </div>
            </div>

            <hr class="my-4">

            
            <div class="row align-items-center mb-5">
                <div class="col-md-9">
                    <h4 class="fw-semibold" style="color: #003366;">Staff Coordinator</h4>
                    <h6 class="mb-1 mt-3"><?php echo e($club->staff_coordinator_name); ?></h6>
                    <p class="mb-0 text-muted"><i class="bi bi-envelope"></i> <?php echo e($club->staff_coordinator_email); ?></p>
                </div>
            </div>

            <hr class="my-4">

            
            <div>
                <h4 class="fw-semibold mb-4" style="color: #003366;">Student Coordinators</h4>
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $club->studentCoordinators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <p class="fw-medium text-dark mb-0"><?php echo e($student->name); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-muted">No student coordinators listed.</div>
                    <?php endif; ?>
                </div>
            </div>

            <hr class="my-4">

            
            <div class="mt-5">
                <h4 class="fw-semibold mb-3" style="color: #003366;">Club Events</h4>

                <?php if($club->events->count()): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white align-middle">
    <thead class="table-light">
        <tr>
            <th style="width: 130px;">Event Image</th>
            <th>Event Name & Description</th>
            <th>Date</th>
            <th>Time</th>
            <th style="width: 100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $club->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-center">
                    <?php if($event->image_path): ?>
                        <img src="<?php echo e(asset('storage/' . $event->image_path)); ?>"
                             alt="Event Image"
                             style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                    <?php else: ?>
                        <span class="text-muted">No Image</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="fw-semibold"><?php echo e($event->event_name); ?></div>
                    <div class="text-muted small mt-1"><?php echo e($event->description); ?></div>
                </td>
                <td><?php echo e($event->date); ?></td>
                <td><?php echo e($event->time); ?></td>
                <td>
                    <a href="<?php echo e($baseUrl . '/view/' . $event->id); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-eye"></i> View
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

                    </div>
                <?php else: ?>
                    <p class="text-muted">No events added yet.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.hod', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/hod/club-view.blade.php ENDPATH**/ ?>