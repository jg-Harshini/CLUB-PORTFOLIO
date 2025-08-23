@extends($layout ?? 'layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Club</h2>

   <form action="{{ route('superadmin.clubs', ['action' => 'edit', 'id' => $club->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf

        {{-- Club Name --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Club Name</label>
            <div class="col-sm-9">
                <input type="text" name="club_name" value="{{ $club->club_name }}" class="form-control" required>
            </div>
        </div>

        {{-- Club Logo --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Club Logo</label>
            <div class="col-sm-9">
                <input type="file" name="logo" class="form-control">
                @if ($club->logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $club->logo) }}" width="60" height="60" style="object-fit: contain;" class="border rounded">
                    </div>
                @endif
            </div>
        </div>

        {{-- Introduction --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Introduction</label>
            <div class="col-sm-9">
                <textarea name="introduction" class="form-control" rows="2">{{ $club->introduction }}</textarea>
            </div>
        </div>

        {{-- Mission --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Mission</label>
            <div class="col-sm-9">
                <textarea name="mission" class="form-control" rows="2">{{ $club->mission }}</textarea>
            </div>
        </div>

        {{-- Staff Coordinator Name --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Staff Coordinator Name</label>
            <div class="col-sm-9">
                <input type="text" name="staff_coordinator_name" value="{{ $club->staff_coordinator_name }}" class="form-control" required>
            </div>
        </div>

        {{-- Staff Coordinator Email --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Staff Email</label>
            <div class="col-sm-9">
                <input type="email" name="staff_coordinator_email" value="{{ $club->staff_coordinator_email }}" class="form-control" required>
            </div>
        </div>

        {{-- Staff Coordinator Photo --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Staff Coordinator Photo</label>
            <div class="col-sm-9">
                <input type="file" name="staff_coordinator_photo" class="form-control">
                @if ($club->staff_coordinator_photo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $club->staff_coordinator_photo) }}" width="60" height="60" style="object-fit: cover;" class="rounded-circle shadow">
                    </div>
                @endif
            </div>
        </div>
{{-- Staff Coordinator 2 Name --}}
<div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Staff Coordinator 2 Name</label>
    <div class="col-sm-9">
        <input type="text" name="staff_coordinator2_name" value="{{ $club->staff_coordinator2_name }}" class="form-control">
    </div>
</div>

{{-- Staff Coordinator 2 Email --}}
<div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Staff Coordinator 2 Email</label>
    <div class="col-sm-9">
        <input type="email" name="staff_coordinator2_email" value="{{ $club->staff_coordinator2_email }}" class="form-control">
    </div>
</div>

{{-- Staff Coordinator 2 Photo --}}
<div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Staff Coordinator 2 Photo</label>
    <div class="col-sm-9">
        <input type="file" name="staff_coordinator2_photo" class="form-control">
        @if ($club->staff_coordinator2_photo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $club->staff_coordinator2_photo) }}" width="60" height="60" style="object-fit: cover;" class="rounded-circle shadow">
            </div>
        @endif
    </div>
</div>

        {{-- Year of Start --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Year Started</label>
            <div class="col-sm-9">
                <input type="number" name="year_started" value="{{ $club->year_started }}" class="form-control" required>
            </div>
        </div>
@php
    $departments = DB::table('departments')->orderBy('name')->get();
@endphp

<div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Department</label>
    <div class="col-sm-9">
        <select name="department_id" class="form-select" required>
            <option value="">Select Department</option>
            @foreach ($departments as $dept)
                <option value="{{ $dept->id }}" {{ $club->department_id == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Category</label>
    <div class="col-sm-9">
        <select name="category" class="form-select" required>
            <option value="">Select Category</option>
            <option value="technical" {{ $club->category == 'technical' ? 'selected' : '' }}>Technical</option>
            <option value="non-technical" {{ $club->category == 'non-technical' ? 'selected' : '' }}>Non-Technical</option>
        </select>
    </div>
</div>

        {{-- Student Coordinators --}}
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Student Coordinators</label>
            <div class="col-sm-9" id="student-fields">
                @foreach ($club->studentCoordinators as $student)
                    <div class="input-group mb-2">
                        <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                        <input type="text" name="student_names[]" value="{{ $student->name }}" class="form-control me-2" placeholder="Name">
                        <input type="file" name="student_photos[]" class="form-control">
                        @if ($student->photo)
                            <span class="ms-2">
                                <img src="{{ asset('storage/' . $student->photo) }}" width="40" height="40" class="rounded">
                            </span>
                        @endif
                    </div>
                @endforeach

                {{-- New Empty Row --}}
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
@php
    $clubAdmin = $club->user; // assuming Club model has user() relationship for club_admin
@endphp

<h4>Club Admin Details</h4>
<div class="form-group mb-3">
    <label for="admin_name">Admin Name</label>
    <input type="text" name="admin_name" class="form-control" value="{{ $clubAdmin->name ?? '' }}" required>
</div>

<div class="form-group mb-3">
    <label for="admin_email">Admin Email</label>
    <input type="email" name="admin_email" class="form-control" value="{{ $clubAdmin->email ?? '' }}" required>
</div>

<div class="form-group mb-3">
    <label for="admin_password">Admin Password (leave blank if unchanged)</label>
    <input type="password" name="admin_password" class="form-control" autocomplete="new-password">
</div>

        {{-- Submit --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update Club</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
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
@endsection
