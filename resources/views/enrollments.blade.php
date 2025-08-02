@extends('layout.clubadmin')
@section('title', 'Enrollments')
@section('content')
<div class="main-content">
  <h2>Club Enrollments</h2>

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
  </div>

  <div class="mb-3 d-flex gap-2">
    <a id="excelExport" href="{{ route('clubadmin.export.excel') }}" class="btn btn-success">Download Excel</a>
    <a id="pdfExport" href="{{ route('clubadmin.export.pdf') }}" class="btn btn-danger">Download PDF</a>
  </div>

  <div class="table-responsive">
<form id="enrollmentsForm" method="POST" action="{{ route('clubadmin.enrollments.action') }}">
    @csrf
    <input type="hidden" name="action" id="bulkAction" value="">
    <table id="clubTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Roll No</th>
                <th>Name</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="{{ $student->club_reg_id }}"></td>
                    <td>{{ $student->roll_no }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->department }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <button type="button" class="btn btn-success" onclick="submitBulkAction('accept')">Accept Selected</button>
        <button type="button" class="btn btn-danger" onclick="submitBulkAction('reject')">Reject Selected</button>
    </div>
</form>

  </div>
  
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
  const table = $('#clubTable').DataTable();

  function updateExportLinks() {
    const dept = $('#deptFilter').val();
    let pdfUrl = '{{ route("clubadmin.export.pdf") }}';
    let excelUrl = '{{ route("clubadmin.export.excel") }}';

    const params = new URLSearchParams();
    if (dept) params.append('dept', dept);

    if (params.toString()) {
      pdfUrl += '?' + params.toString();
      excelUrl += '?' + params.toString();
    }

    $('#pdfExport').attr('href', pdfUrl);
    $('#excelExport').attr('href', excelUrl);
  }

  $('#deptFilter').on('change', function () {
    const dept = $(this).val().toLowerCase();
    table.rows().every(function () {
      const data = this.data();
      const match = !dept || data[2].toLowerCase() === dept;
      $(this.node()).toggle(match);
    });
    updateExportLinks();
  });

  updateExportLinks();
});
document.getElementById('selectAll').addEventListener('change', function() {
    document.querySelectorAll('input[name="selected_ids[]"]').forEach(cb => cb.checked = this.checked);
});

function submitBulkAction(action) {
    let selected = Array.from(document.querySelectorAll('input[name="selected_ids[]"]:checked'))
        .map(cb => cb.value);

    if (selected.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'No selection',
            text: 'Please select at least one student.'
        });
        return;
    }

    $.ajax({
        url: "{{ route('clubadmin.enrollments.action') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            action: action,
            selected_ids: selected
        },
        success: function (response) {
            // Remove rejected rows instantly
            if (action === 'reject') {
                selected.forEach(id => {
                    $('input[value="' + id + '"]').closest('tr').remove();
                });
            }

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
            });
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong!'
            });
        }
    });
}


</script>

@endsection
