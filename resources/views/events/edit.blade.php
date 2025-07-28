@extends($layout ?? 'layout.app')
@php
    $user = Auth::user();
    $routeName = $user->role === 'club_admin' ? 'clubadmin.events' : 'superadmin.events';
@endphp

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-primary">Edit Event Details</h3>

    <form action="{{ route($routeName, ['action' => 'edit', 'id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="club_id" value="{{ $event->club_id }}">

        <!-- Event Name -->
        <div class="mb-3">
            <label class="form-label">Event Name</label>
            <input type="text" name="event_name" value="{{ $event->event_name }}" class="form-control" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
        </div>

<!-- Chief Guest -->
<div class="mb-3">
    <label class="form-label">Chief Guest</label>
    <input type="text" name="chief_guest" value="{{ $event->chief_guest ?? 'NA' }}" class="form-control" placeholder="Enter Chief Guest name (optional)">
</div>

        <!-- Start & End Dates -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" value="{{ $event->start_date }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" value="{{ $event->end_date }}" class="form-control" required>
            </div>
        </div>

        <!-- Start & End Times -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Start Time</label>
                <input type="time" name="start_time" value="{{ $event->start_time }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">End Time</label>
                <input type="time" name="end_time" value="{{ $event->end_time }}" class="form-control" required>
            </div>
        </div>

        <!-- Stats -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Participants</label>
                <input type="number" name="participants" class="form-control" value="{{ $event->participants }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Coordinators</label>
                <input type="number" name="coordinators" class="form-control" value="{{ $event->coordinators }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Best Performance</label>
                <input type="number" name="best_performance" class="form-control" value="{{ $event->best_performance }}" required>
            </div>
        </div>

        <!-- Event Image -->
        <div class="mb-3">
            <label class="form-label">Event Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if ($event->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $event->image_path) }}" width="180" class="rounded shadow border" alt="Event Image">
                </div>
            @endif
        </div>

        <!-- Winner Name -->
        <div class="mb-3">
            <label class="form-label">Winner Name</label>
            <input type="text" name="winner_name" class="form-control" value="{{ $event->winner_name }}">
        </div>

        <!-- Winner Photo -->
        <div class="mb-3">
            <label class="form-label">Winner Photo</label>
            <input type="file" name="winner_photo" class="form-control" accept="image/*">
            @if ($event->winner_photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $event->winner_photo) }}" width="150" class="rounded border shadow-sm" alt="Winner Photo">
                </div>
            @endif
        </div>

        <!-- Event Gallery -->
        <div class="mb-3">
            <label class="form-label">Gallery Images</label>
            <input type="file" name="gallery[]" class="form-control" multiple accept="image/*">
            <small class="text-muted">Upload images with geo tag.</small>
        </div>

        @if ($event->gallery && is_array(json_decode($event->gallery, true)))
            <div class="row g-3 mb-3">
                @foreach(json_decode($event->gallery, true) as $img)
                    <div class="col-6 col-md-3">
                        <div class="border rounded shadow-sm p-1 bg-white">
                            <img src="{{ asset('storage/' . $img) }}"
                                 class="img-fluid rounded"
                                 style="height: 140px; object-fit: cover; width: 100%;"
                                 alt="Gallery Image">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Buttons -->
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Update Event</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
