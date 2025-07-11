<?php $__env->startSection('title', 'Enrollments'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">
  <h2>Club Enrollment Table</h2>

  <!-- FILTERS -->
  <div class="row mb-4">
  <div class="col-md-6">
    <label for="deptFilter" class="form-label fw-semibold">Filter by Department</label>
    <select id="deptFilter" class="form-select">
      <option value="">All Departments</option>
      <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($dept); ?>"><?php echo e($dept); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="clubFilter" class="form-label fw-semibold">Filter by Club</label>
    <select id="clubFilter" class="form-select">
      <option value="">All Clubs</option>
      <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($club->club_name); ?>"><?php echo e($club->club_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
</div>

  <!-- TABLE -->
  <div class="table-responsive">
    <table id="clubTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Department</th>
          <th>Club Enrolled</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($student->name); ?></td>
            <td><?php echo e($student->department); ?></td>
            <td><?php echo e($student->club_enrolled); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    const table = $('#clubTable').DataTable();

    $('#deptFilter, #clubFilter').on('change', function () {
      const dept = $('#deptFilter').val().toLowerCase();
      const club = $('#clubFilter').val().toLowerCase();

      table.rows().every(function () {
        const data = this.data();
        const deptMatch = !dept || data[1].toLowerCase() === dept;
        const clubMatch = !club || data[2].toLowerCase() === club;

        $(this.node()).toggle(deptMatch && clubMatch);
      });
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\clubportfolio\resources\views/table.blade.php ENDPATH**/ ?>