@extends('layout.hod')

@section('content')
<div class="p-4" style="max-height: 100vh; overflow-y: auto; background-color: #f8f9fc;">
    <div class="container-fluid">
        <div class="card shadow-lg rounded-4 p-5 border-0 bg-white">

            {{-- Club Header --}}
            <div class="row align-items-center mb-5">
                @if ($club->logo)
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <img src="{{ asset('storage/' . $club->logo) }}" alt="Club Logo"
                             class="img-fluid rounded shadow-sm border"
                             style="max-height: 150px; object-fit: contain;">
                    </div>
                @endif
                <div class="col-md-9">
                    <h2 class="fw-bold" style="color: #003366;">{{ $club->club_name }}</h2>
                    <p class="text-muted"><strong>Founded:</strong> {{ $club->year_started }}</p>
                    <p class="mt-3">{{ $club->introduction ?? '—' }}</p>

                    <h5 class="fw-semibold mt-4" style="color: #003366;">Mission</h5>
                    <p>{{ $club->mission ?? '—' }}</p>
                </div>
            </div>

            <hr class="my-4">

            {{-- Staff Coordinator --}}
            <div class="row align-items-center mb-5">
                <div class="col-md-9">
                    <h4 class="fw-semibold" style="color: #003366;">Staff Coordinator</h4>
                    <h6 class="mb-1 mt-3">{{ $club->staff_coordinator_name }}</h6>
                    <p class="mb-0 text-muted"><i class="bi bi-envelope"></i> {{ $club->staff_coordinator_email }}</p>
                </div>
            </div>

            <hr class="my-4">

            {{-- Student Coordinators --}}
            <div>
                <h4 class="fw-semibold mb-4" style="color: #003366;">Student Coordinators</h4>
                <div class="row">
                    @forelse ($club->studentCoordinators as $student)
                        <p class="fw-medium text-dark mb-0">{{ $student->name }}</p>
                    @empty
                        <div class="text-muted">No student coordinators listed.</div>
                    @endforelse
                </div>
            </div>

            <hr class="my-4">

            {{-- Events Section --}}
            <div class="mt-5">
                <h4 class="fw-semibold mb-3" style="color: #003366;">Club Events</h4>

                @if ($club->events->count())
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white align-middle">
    <thead class="table-light">
        <tr>
            <th style="width: 130px;">Event Image</th>
            <th>Event Name & Description</th>
            <th>Date</th>
            <th>Time</th>
            <th style="width: 100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($club->events as $event)
            <tr>
                <td class="text-center">
                    @if($event->image_path)
                        <img src="{{ asset('storage/' . $event->image_path) }}"
                             alt="Event Image"
                             style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>
                    <div class="fw-semibold">{{ $event->event_name }}</div>
                    <div class="text-muted small mt-1">{{ $event->description }}</div>
                </td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->time }}</td>
                <td>
                    <a href="{{ $baseUrl . '/view/' . $event->id }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-eye"></i> View
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

                    </div>
                @else
                    <p class="text-muted">No events added yet.</p>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
