@extends('layout.hod')

@section('title', 'Department Enrollments')

@section('content')
<div class="main-content">
  <h2>Enrollments in {{ $department }} Department</h2>

  <!-- CLUB Filter only -->
  <div class="row mb-4">
    <div class="col-md-6">
      <label for="clubFilter" class="form-label fw-semibold">Filter by Club</label>
      <select id="clubFilter" class="form-select">
        <option value="">All Clubs</option>
        @foreach ($clubs as $club)
          <option value="{{ $club->club_name }}">{{ $club->club_name }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <!-- Export Buttons -->
  <div class="mb-3 d-flex gap-2">
    <a id="excelExport" href="{{ route('hod.export.excel') }}" class="btn btn-success">Download Excel</a>
    <a id="pdfExport" href="{{ route('hod.export.pdf') }}" class="btn btn-danger">Download PDF</a>
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
        @foreach ($students as $student)
          <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['club_enrolled'] }}</td>
          </tr>
        @endforeach
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
const dept = '{{ $department }}'; // Pass from backend to JS

    function updateExportLinks() {
      const club = $('#clubFilter').val();
      let pdfUrl = '{{ route("hod.export.pdf") }}';
      let excelUrl = '{{ route("hod.export.excel") }}';

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
@endsection
