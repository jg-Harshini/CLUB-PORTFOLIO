<?php $__env->startSection('title', 'Department Enrollments'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">
  <h2>Enrollments in <?php echo e($department); ?> Department</h2>

  <!-- CLUB Filter only -->
  <div class="row mb-4">
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

  <!-- Export Buttons -->
  <div class="mb-3 d-flex gap-2">
    <a id="excelExport" href="<?php echo e(route('hod.export.excel')); ?>" class="btn btn-success">Download Excel</a>
    <a id="pdfExport" href="<?php echo e(route('hod.export.pdf')); ?>" class="btn btn-danger">Download PDF</a>
  </div>

  <!-- TABLE -->
  <div class="table-responsive">
    <table id="clubTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Club Enrolled</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($student['name']); ?></td>
            <td><?php echo e($student['club_enrolled']); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    const table = $('#clubTable').DataTable();
const dept = '<?php echo e($department); ?>'; // Pass from backend to JS

    function updateExportLinks() {
      const club = $('#clubFilter').val();
      let pdfUrl = '<?php echo e(route("hod.export.pdf")); ?>';
      let excelUrl = '<?php echo e(route("hod.export.excel")); ?>';

  if (club) {
    pdfUrl += '?club=' + encodeURIComponent(club) + '&dept=' + encodeURIComponent(dept);
    excelUrl += '?club=' + encodeURIComponent(club) + '&dept=' + encodeURIComponent(dept);
} else {
    pdfUrl += '?dept=' + encodeURIComponent(dept);
    excelUrl += '?dept=' + encodeURIComponent(dept);
}


      $('#pdfExport').attr('href', pdfUrl);
      $('#excelExport').attr('href', excelUrl);
    }

    $('#clubFilter').on('change', function () {
      const selectedClub = $(this).val().toLowerCase();

      table.rows().every(function () {
        const rowData = this.data();
        const enrolledClubs = rowData[1].toLowerCase();
        const match = !selectedClub || enrolledClubs.includes(selectedClub);
        $(this.node()).toggle(match);
      });

      updateExportLinks();
    });

    updateExportLinks(); // Initial update
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.hod', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/hod/enrollments.blade.php ENDPATH**/ ?>