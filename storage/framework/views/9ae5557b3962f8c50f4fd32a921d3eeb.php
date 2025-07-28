<?php $__env->startSection('title', 'Club Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
  <div class="col-12">
    <h3 class="text-dark fw-bold mt-0">Welcome, <?php echo e(Auth::user()->name); ?></h3>
    <p class="text-muted">Here’s your club’s overview</p>
  </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
  <div class="col-lg-6 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #e8f0fe;">
      <div class="card-body">
        <h5 class="card-title">Total Events</h5>
        <h2 class="fw-bold"><?php echo e($eventCount); ?></h2>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #fff3cd;">
      <div class="card-body">
        <h5 class="card-title">Upcoming Event</h5>
        <h5 class="fw-bold"><?php echo e($nextEvent ? $nextEvent->event_name : 'No Upcoming Events'); ?></h5>
        <p><?php echo e($nextEvent ? \Carbon\Carbon::parse($nextEvent->date)->format('d M, Y') : ''); ?></p>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.clubadmin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/ca/dash.blade.php ENDPATH**/ ?>