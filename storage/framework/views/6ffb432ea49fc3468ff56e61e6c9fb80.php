<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Edit Club</h2>

   <form action="<?php echo e(route('superadmin.clubs', ['action' => 'edit', 'id' => $club->id])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

        <?php echo csrf_field(); ?>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Club Name</label>
            <div class="col-sm-9">
                <input type="text" name="club_name" value="<?php echo e($club->club_name); ?>" class="form-control" required>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Club Logo</label>
            <div class="col-sm-9">
                <input type="file" name="logo" class="form-control">
                <?php if($club->logo): ?>
                    <div class="mt-2">
                        <img src="<?php echo e(asset('storage/' . $club->logo)); ?>" width="60" height="60" style="object-fit: contain;" class="border rounded">
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Introduction</label>
            <div class="col-sm-9">
                <textarea name="introduction" class="form-control" rows="2"><?php echo e($club->introduction); ?></textarea>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Mission</label>
            <div class="col-sm-9">
                <textarea name="mission" class="form-control" rows="2"><?php echo e($club->mission); ?></textarea>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Staff Coordinator Name</label>
            <div class="col-sm-9">
                <input type="text" name="staff_coordinator_name" value="<?php echo e($club->staff_coordinator_name); ?>" class="form-control" required>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Staff Email</label>
            <div class="col-sm-9">
                <input type="email" name="staff_coordinator_email" value="<?php echo e($club->staff_coordinator_email); ?>" class="form-control" required>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Staff Coordinator Photo</label>
            <div class="col-sm-9">
                <input type="file" name="staff_coordinator_photo" class="form-control">
                <?php if($club->staff_coordinator_photo): ?>
                    <div class="mt-2">
                        <img src="<?php echo e(asset('storage/' . $club->staff_coordinator_photo)); ?>" width="60" height="60" style="object-fit: cover;" class="rounded-circle shadow">
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Year Started</label>
            <div class="col-sm-9">
                <input type="number" name="year_started" value="<?php echo e($club->year_started); ?>" class="form-control" required>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Student Coordinators</label>
            <div class="col-sm-9" id="student-fields">
                <?php $__currentLoopData = $club->studentCoordinators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="input-group mb-2">
                        <input type="hidden" name="student_ids[]" value="<?php echo e($student->id); ?>">
                        <input type="text" name="student_names[]" value="<?php echo e($student->name); ?>" class="form-control me-2" placeholder="Name">
                        <input type="file" name="student_photos[]" class="form-control">
                        <?php if($student->photo): ?>
                            <span class="ms-2">
                                <img src="<?php echo e(asset('storage/' . $student->photo)); ?>" width="40" height="40" class="rounded">
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <div class="input-group mb-2">
                    <input type="hidden" name="student_ids[]" value="">
                    <input type="text" name="student_names[]" class="form-control me-2" placeholder="New Name">
                    <input type="file" name="student_photos[]" class="form-control">
                </div>
            </div>

            <div class="col-sm-9 offset-sm-3 mt-2">
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addStudent()">+ Add Another</button>
            </div>
        </div>

        
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update Club</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function addStudent() {
        const container = document.getElementById('student-fields');
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');
        div.innerHTML = `
            <input type="hidden" name="student_ids[]" value="">
            <input type="text" name="student_names[]" class="form-control me-2" placeholder="New Name">
            <input type="file" name="student_photos[]" class="form-control">
        `;
        container.appendChild(div);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout ?? 'layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/clubs/edit.blade.php ENDPATH**/ ?>