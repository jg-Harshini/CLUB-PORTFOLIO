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
            <td>
                @if ($student->status === 'accepted')
                    <span class="accepted-label" style="margin-left:6px; color:green; font-weight:bold;">Accepted</span>
                @else
                    <input type="checkbox" name="selected_ids[]" value="{{ $student->club_reg_id }}">
                @endif
            </td>
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
    console.log("✅ Document Ready");

    const table = $('#clubTable').DataTable({
        pageLength: 10,
        lengthChange: true,
        ordering: true,
        searching: true
    });
    console.log("✅ DataTable initialized");

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

        console.log("🔗 Export links updated:", { pdfUrl, excelUrl });
    }

   $('#deptFilter').on('change', function () {
    const dept = $(this).val();
    console.log("🔎 Dept filter changed:", dept);

    // Apply filter + draw immediately
    table.column(3)
         .search(dept ? '^' + dept + '$' : '', true, false)
         .draw();

    // ✅ Always reset to first page after filter
    table.page(0).draw('page');

    // Debug rows count
    console.log("📊 Filtered rows count:", table.rows({ filter: 'applied' }).count());

    updateExportLinks();
});


    // ✅ Select/Deselect all
    $('#selectAll').on('change', function() {
        const checked = this.checked;
        $('input[name="selected_ids[]"]').prop('checked', checked);
        console.log("☑️ Select All toggled:", checked);
    });
});

function submitBulkAction(action) {
    let selected = $('input[name="selected_ids[]"]:checked').map(function() {
        return $(this).val();
    }).get();

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
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            selected_ids: selected,
            action: action
        },
        success: function(response) {
            if (response.status === 'success') {
                if (action === 'reject') {
                    // Remove rejected rows
                    selected.forEach(function(id) {
                        $('input[value="' + id + '"]').closest('tr').remove();
                    });
                } 
                else if (action === 'accept') {
                    // Mark accepted visually without removing
                    selected.forEach(function(id) {
                        let checkbox = $('input[value="' + id + '"]');
                        checkbox.prop('checked', false)
                                .prop('disabled', true)
                                .css({ cursor: 'not-allowed', opacity: '0.5' });
                        if (!checkbox.parent().find('.accepted-label').length) {
                            checkbox.parent().append(
                                '<span class="accepted-label" style="margin-left:6px; color:green; font-weight:bold;">Accepted</span>'
                            );
                        }
                    });
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Done',
                    text: response.message,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function() {
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
