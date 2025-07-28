@extends('layout.app')

@section('title', 'Enrollments')

@section('content')
<div class="main-content">
  <h2>Club Enrollment Table</h2>

  <!-- FILTERS -->
  <div class="row mb-4">
    <div class="col-md-6">
      <label for="deptFilter" class="form-label fw-semibold">Filter by Department</label>
      <select id="deptFilter" class="form-select">
        <option value="">All Departments</option>
        @foreach ($departments as $dept)
          <option value="{{ $dept }}">{{ $dept }}</option>
        @endforeach
      </select>
    </div>

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
    <a id="excelExport" href="{{ route('export.excel') }}" class="btn btn-success">Download Excel</a>
    <a id="pdfExport" href="{{ route('export.pdf') }}" class="btn btn-danger">Download PDF</a>
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
        @foreach ($students as $student)
          <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->department }}</td>
            <td>{{ $student->club_enrolled }}</td>
          </tr>
        @endforeach
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

    function updateExportLinks() {
      const club = $('#clubFilter').val();
      const dept = $('#deptFilter').val();

      let pdfUrl = '{{ route("export.pdf") }}';
      let excelUrl = '{{ route("export.excel") }}';

      const params = new URLSearchParams();
      if (club) params.append('club', club);
      if (dept) params.append('dept', dept);

      if (params.toString()) {
        pdfUrl += '?' + params.toString();
        excelUrl += '?' + params.toString();
      }

      $('#pdfExport').attr('href', pdfUrl);
      $('#excelExport').attr('href', excelUrl);
    }

    $('#deptFilter, #clubFilter').on('change', function () {
      const dept = $('#deptFilter').val().toLowerCase();
      const club = $('#clubFilter').val().toLowerCase();

      table.rows().every(function () {
        const data = this.data();
        const deptMatch = !dept || data[1].toLowerCase() === dept;
        const clubMatch = !club || data[2].toLowerCase() === club;

        $(this.node()).toggle(deptMatch && clubMatch);
      });

      updateExportLinks();
    });

    updateExportLinks(); // Initial run
  });
</script>
@endsection
