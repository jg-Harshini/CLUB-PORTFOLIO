@extends('layout.app')

@section('title', 'Add Club')

@section('content')
<h2 class="mb-4">Add Club</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('superadmin.clubs', ['action' => 'create']) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Club Name</label>
        <div class="col-sm-9">
            <input type="text" name="club_name" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="logo" class="form-label">Club Logo</label>
        <input type="file" name="logo" class="form-control" accept="image/*" required>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Introduction</label>
        <div class="col-sm-9">
            <textarea name="introduction" class="form-control" rows="2"></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Mission</label>
        <div class="col-sm-9">
            <textarea name="mission" class="form-control" rows="2"></textarea>
        </div>
    </div>

    {{-- Staff Coordinator 1 --}}
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Staff Coordinator Name</label>
        <div class="col-sm-9">
            <input type="text" name="staff_coordinator_name" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Staff Email</label>
        <div class="col-sm-9">
            <input type="email" name="staff_coordinator_email" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Staff Photo</label>
        <div class="col-sm-9">
            <input type="file" name="staff_coordinator_photo" class="form-control" accept="image/*">
        </div>
    </div>

    {{-- Staff Coordinator 2 (New) --}}
    <hr>
    <h5>Second Staff Coordinator (Optional)</h5>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Staff Coordinator 2 Name</label>
        <div class="col-sm-9">
            <input type="text" name="staff_coordinator2_name" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Staff Coordinator 2 Email</label>
        <div class="col-sm-9">
            <input type="email" name="staff_coordinator2_email" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Staff Coordinator 2 Photo</label>
        <div class="col-sm-9">
            <input type="file" name="staff_coordinator2_photo" class="form-control" accept="image/*">
        </div>
    </div>

    {{-- Other club details --}}
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Year Started</label>
        <div class="col-sm-9">
            <input type="number" name="year_started" class="form-control" required>
        </div>
    </div>

   @php
    $departments = DB::table('departments')->orderBy('name')->get();
   @endphp

   <div class="row mb-3">
       <label class="col-sm-3 col-form-label">Department</label>
       <div class="col-sm-9">
           <select name="department_id" class="form-select" required>
               <option value="">Select Department</option>
               @foreach ($departments as $dept)
                   <option value="{{ $dept->id }}">{{ $dept->name }}</option>
               @endforeach
           </select>
       </div>
   </div>

   <div class="row mb-3">
       <label class="col-sm-3 col-form-label">Category</label>
       <div class="col-sm-9">
           <select name="category" class="form-select" required>
               <option value="">Select Category</option>
               <option value="Technical">Technical</option>
               <option value="Non-Technical">Non-Technical</option>
           </select>
       </div>
   </div>

    {{-- Student Coordinators --}}
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Student Coordinators</label>
        <div class="col-sm-9" id="student-fields">
            <div class="input-group mb-2">
                <input type="text" name="student_names[]" class="form-control me-2" placeholder="Name">
                <input type="file" name="student_photos[]" class="form-control" accept="image/*">
            </div>
        </div>
        <div class="col-sm-9 offset-sm-3">
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addStudent()">+ Add Another</button>
        </div>
    </div>

    {{-- Club Admin --}}
    <h4>Club Admin Details</h4>
    <div class="form-group">
        <label for="admin_name">Admin Name</label>
        <input type="text" name="admin_name" id="admin_name" class="form-control" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="admin_email">Admin Email</label>
        <input type="email" name="admin_email" id="admin_email" class="form-control" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="admin_password">Admin Password</label>
        <input type="password" name="admin_password" id="admin_password" class="form-control" autocomplete="new-password" required>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary" style="background-color: #4d9de0; border: none;">Add Club</button>
    </div>
    
</form>

<script>
    function addStudent() {
        const container = document.getElementById('student-fields');
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');
        div.innerHTML = `
            <input type="text" name="student_names[]" class="form-control me-2" placeholder="Name">
            <input type="file" name="student_photos[]" class="form-control" accept="image/*">
        `;
        container.appendChild(div);
    }
</script>

@endsection
