<?php
    $user = Auth::user();
    $routeName = $user->role === 'club_admin' ? 'clubadmin.events' : 'superadmin.events';
?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h3 class="mb-4 text-primary">Edit Event Details</h3>

    <form action="<?php echo e(route($routeName, ['action' => 'edit', 'id' => $event->id])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="club_id" value="<?php echo e($event->club_id); ?>">

        <!-- Event Name -->
        <div class="mb-3">
            <label class="form-label">Event Name</label>
            <input type="text" name="event_name" value="<?php echo e($event->event_name); ?>" class="form-control" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"><?php echo e($event->description); ?></textarea>
        </div>

<!-- Chief Guest -->
<div class="mb-3">
    <label class="form-label">Chief Guest</label>
    <input type="text" name="chief_guest" value="<?php echo e($event->chief_guest ?? 'NA'); ?>" class="form-control" placeholder="Enter Chief Guest name (optional)">
</div>

        <!-- Start & End Dates -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" value="<?php echo e($event->start_date); ?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" value="<?php echo e($event->end_date); ?>" class="form-control" required>
            </div>
        </div>

        <!-- Start & End Times -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Start Time</label>
                <input type="time" name="start_time" value="<?php echo e($event->start_time); ?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">End Time</label>
                <input type="time" name="end_time" value="<?php echo e($event->end_time); ?>" class="form-control" required>
            </div>
        </div>

        <!-- Stats -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Participants</label>
                <input type="number" name="participants" class="form-control" value="<?php echo e($event->participants); ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Coordinators</label>
                <input type="number" name="coordinators" class="form-control" value="<?php echo e($event->coordinators); ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Best Performance</label>
                <input type="number" name="best_performance" class="form-control" value="<?php echo e($event->best_performance); ?>" required>
            </div>
        </div>

        <!-- Event Image -->
        <div class="mb-3">
            <label class="form-label">Event Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <?php if($event->image_path): ?>
                <div class="mt-2">
                    <img src="<?php echo e(asset('storage/' . $event->image_path)); ?>" width="180" class="rounded shadow border" alt="Event Image">
                </div>
            <?php endif; ?>
        </div>

        <!-- Winner Name -->
        <div class="mb-3">
            <label class="form-label">Winner Name</label>
            <input type="text" name="winner_name" class="form-control" value="<?php echo e($event->winner_name); ?>">
        </div>

        <!-- Winner Photo -->
        <div class="mb-3">
            <label class="form-label">Winner Photo</label>
            <input type="file" name="winner_photo" class="form-control" accept="image/*">
            <?php if($event->winner_photo): ?>
                <div class="mt-2">
                    <img src="<?php echo e(asset('storage/' . $event->winner_photo)); ?>" width="150" class="rounded border shadow-sm" alt="Winner Photo">
                </div>
            <?php endif; ?>
        </div>

        <!-- Event Gallery -->
        <div class="mb-3">
            <label class="form-label">Gallery Images</label>
            <input type="file" name="gallery[]" class="form-control" multiple accept="image/*">
            <small class="text-muted">Upload images with geo tag.</small>
        </div>

        <?php if($event->gallery && is_array(json_decode($event->gallery, true))): ?>
            <div class="row g-3 mb-3">
                <?php $__currentLoopData = json_decode($event->gallery, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-3">
                        <div class="border rounded shadow-sm p-1 bg-white">
                            <img src="<?php echo e(asset('storage/' . $img)); ?>"
                                 class="img-fluid rounded"
                                 style="height: 140px; object-fit: cover; width: 100%;"
                                 alt="Gallery Image">
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <!-- Buttons -->
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Update Event</button>
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout ?? 'layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/events/edit.blade.php ENDPATH**/ ?>