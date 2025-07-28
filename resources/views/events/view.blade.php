<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@extends($layout ?? 'layout.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <div class="card shadow border-0 rounded-4 p-5 bg-light">

       {{-- Title --}}
<h3 class="text-center fw-bold display-7 mb-4 text-uppercase"
    style="color: #000; font-family: 'Segoe UI', sans-serif; letter-spacing: 1px;">
    {{ $event->event_name }}
</h3>


        {{-- Main Section: Image + Info --}}
        <div class="row g-5 mb-5 align-items-center">
            {{-- Left: Event Image --}}
            <div class="col-lg-5 text-center">
                @if ($event->image_path)
                <img src="{{ asset('storage/' . $event->image_path) }}"
                     alt="Event Image"
                     class="img-fluid rounded-4 shadow border"
                     style=" object-fit: cover;">
                @endif
            </div>

            {{-- Right: Event Details --}}
            <div class="col-lg-7">
                {{-- Description --}}
                <h5 class="fw-semibold text-secondary mb-3">
                    <i class="bi bi-file-earmark-text text-info me-2"></i>Description
                </h5>
                <p class="fs-5 text-dark lh-lg">{{ $event->description }}</p>

                {{-- Date and Time --}}
<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <h6 class="fw-semibold text-muted">
            <i class="bi bi-calendar-week text-danger me-2"></i>Date
        </h6>
        <div class="fs-6 text-dark">
            {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }} to
            {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <h6 class="fw-semibold text-muted">
            <i class="bi bi-clock-history text-success me-2"></i>Time
        </h6>
        <div class="fs-6 text-dark">
            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} -
            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
        </div>
    </div>
</div>

            </div>
        </div>

        {{-- Winner Name --}}
        @if ($event->winner_name)
        <div class="mb-4">
            <h6 class="text-muted fw-semibold">
                <i class="bi bi-trophy-fill text-warning me-2"></i>Winner Name
            </h6>
            <div class="fs-6 text-dark">{{ $event->winner_name }}</div>
        </div>
        @endif

        {{-- Winner Photo --}}
        @if ($event->winner_photo)
        <div class="mb-4">
            <h6 class="text-muted fw-semibold">
                <i class="bi bi-person-badge-fill text-primary me-2"></i>Winner Photo
            </h6>
            <img src="{{ asset('storage/' . $event->winner_photo) }}"
                 alt="Winner Photo"
                 class="img-fluid rounded-3 shadow border"
                 style="max-width: 100%; max-height: 400px; object-fit: cover;">
        </div>
        @endif

        {{-- Gallery --}}
        @if ($event->gallery)
        <div class="mb-5">
            <h6 class="text-muted fw-semibold">
                <i class="bi bi-images me-2 text-secondary"></i>Gallery
            </h6>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
                @foreach (json_decode($event->gallery, true) as $img)
                <div class="col">
                    <div class="border rounded shadow-sm bg-white overflow-hidden">
                        <img src="{{ asset('storage/' . $img) }}"
                             alt="Gallery Image"
                             class="img-fluid"
                             style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- Back Button --}}
        <div class="text-center mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                ← Back to Club
            </a>
        </div>
        @php
    $printRoute = auth()->user()->role === 'superadmin' 
        ? route('superadmin.events.print', ['id' => $event->id]) 
        : route('hod.events.print', ['id' => $event->id]);
@endphp

<div class="text-start mt-4">
    <a href="{{ $printRoute }}" 
       target="_blank" 
       class="btn btn-outline-primary">
        <i class="bi bi-printer me-2"></i> Print Report
    </a>
</div>


    </div>
</div>
@endsection
