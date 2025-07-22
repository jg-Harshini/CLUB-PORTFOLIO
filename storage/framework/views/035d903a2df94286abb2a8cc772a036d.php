<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-5">
    <div class="card shadow border-0 rounded-4 p-5 bg-light">

       
<h3 class="text-center fw-bold display-7 mb-4 text-uppercase"
    style="color: #000; font-family: 'Segoe UI', sans-serif; letter-spacing: 1px;">
    <?php echo e($event->event_name); ?>

</h3>


        
        <div class="row g-5 mb-5 align-items-center">
            
            <div class="col-lg-5 text-center">
                <?php if($event->image_path): ?>
                <img src="<?php echo e(asset('storage/' . $event->image_path)); ?>"
                     alt="Event Image"
                     class="img-fluid rounded-4 shadow border"
                     style=" object-fit: cover;">
                <?php endif; ?>
            </div>

            
            <div class="col-lg-7">
                
                <h5 class="fw-semibold text-secondary mb-3">
                    <i class="bi bi-file-earmark-text text-info me-2"></i>Description
                </h5>
                <p class="fs-5 text-dark lh-lg"><?php echo e($event->description); ?></p>

                
<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <h6 class="fw-semibold text-muted">
            <i class="bi bi-calendar-week text-danger me-2"></i>Date
        </h6>
        <div class="fs-6 text-dark">
            <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('d-m-Y')); ?> to
            <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('d-m-Y')); ?>

        </div>
    </div>
    <div class="col-md-6 mb-3">
        <h6 class="fw-semibold text-muted">
            <i class="bi bi-clock-history text-success me-2"></i>Time
        </h6>
        <div class="fs-6 text-dark">
            <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('h:i A')); ?> -
            <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('h:i A')); ?>

        </div>
    </div>
</div>

            </div>
        </div>

        
        <?php if($event->winner_name): ?>
        <div class="mb-4">
            <h6 class="text-muted fw-semibold">
                <i class="bi bi-trophy-fill text-warning me-2"></i>Winner Name
            </h6>
            <div class="fs-6 text-dark"><?php echo e($event->winner_name); ?></div>
        </div>
        <?php endif; ?>

        
        <?php if($event->winner_photo): ?>
        <div class="mb-4">
            <h6 class="text-muted fw-semibold">
                <i class="bi bi-person-badge-fill text-primary me-2"></i>Winner Photo
            </h6>
            <img src="<?php echo e(asset('storage/' . $event->winner_photo)); ?>"
                 alt="Winner Photo"
                 class="img-fluid rounded-3 shadow border"
                 style="max-width: 100%; max-height: 400px; object-fit: cover;">
        </div>
        <?php endif; ?>

        
        <?php if($event->gallery): ?>
        <div class="mb-5">
            <h6 class="text-muted fw-semibold">
                <i class="bi bi-images me-2 text-secondary"></i>Gallery
            </h6>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
                <?php $__currentLoopData = json_decode($event->gallery, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="border rounded shadow-sm bg-white overflow-hidden">
                        <img src="<?php echo e(asset('storage/' . $img)); ?>"
                             alt="Gallery Image"
                             class="img-fluid"
                             style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>


        
        <div class="text-center mt-4">
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                ← Back to Club
            </a>
        </div>
        <?php
    $printRoute = auth()->user()->role === 'superadmin' 
        ? route('superadmin.events.print', ['id' => $event->id]) 
        : route('hod.events.print', ['id' => $event->id]);
?>

<div class="text-start mt-4">
    <a href="<?php echo e($printRoute); ?>" 
       target="_blank" 
       class="btn btn-outline-primary">
        <i class="bi bi-printer me-2"></i> Print Report
    </a>
</div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout ?? 'layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/events/view.blade.php ENDPATH**/ ?>