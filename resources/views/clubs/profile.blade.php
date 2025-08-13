@extends($layout ?? 'layout.app')


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
                <!--div class="col-md-3 text-center mb-3 mb-md-0">
                    @if ($club->staff_coordinator_photo)
                        <img src="{{ asset('storage/' . $club->staff_coordinator_photo) }}"
                             class="rounded-circle shadow border"
                             width="140" height="140" alt="Staff Photo" style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-light d-flex justify-content-center align-items-center shadow border"
                             style="width: 140px; height: 140px;">
                            <i class="bi bi-person fs-1 text-muted"></i>
                        </div>
                    @endif
                </div-->
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
                        <div class="col-md-3 col-sm-4 col-6 mb-4 text-center">
                            <div class="d-flex flex-column align-items-center">
                                <!--@if ($student->photo)
                                    <img src="{{ asset('storage/' . $student->photo) }}" 
                                         class="rounded-circle shadow border mb-2"
                                         width="140" height="140"
                                         style="object-fit: cover;" 
                                         alt="Student Photo"-->
                                <!--@else
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow border mb-2"
                                         style="width: 120px; height: 120px;">
                                        <i class="bi bi-person-circle fs-1 text-muted"></i>
                                    </div>
                                @endif-->
                            </div>
                        </div>
                                                        <p class="fw-medium text-dark mb-0">{{ $student->name }}</p>

                    @empty
                        <div class="text-muted">No student coordinators listed.</div>
                    @endforelse
                </div>
            </div>

            <hr class="my-4">

            {{-- Events Section --}}
            <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold mb-0" style="color: #003366;">Club Events</h4>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                        + Add Event
                    </button>
                </div>

                @if ($club->events->count())
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 130px;">Event Image</th>
                                    <th>Event Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th style="width: 120px;">Actions</th>
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
                                        <td>{{ $event->event_name }}</td>
<td>
    <div>{{ $event->description }}</div>
    @if(!empty($event->chief_guest) && $event->chief_guest !== 'NA')
        <small class="text-muted d-block mt-1">
            <strong>Chief Guest:</strong> {{ $event->chief_guest }}
        </small>
    @endif
</td>
                                        <td>{{ \Carbon\Carbon::parse($event->start_date)->format('F j ') }} to
                                            {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }} </td>
                                        <td>{{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</td>
      <td class="text-center">
    <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
        {{-- View Button --}}
        <a href="{{ $baseUrl . '/view/' . $event->id }}" 
           class="btn btn-sm btn-outline-info border-2" 
           title="View">
            <i class="bi bi-eye fs-5"></i>
        </a>
        {{-- Edit Button --}}
        <a href="{{ $baseUrl . '/edit/' . $event->id }}" 
           class="btn btn-sm btn-outline-warning border-2" 
           title="Edit">
            <i class="bi bi-pencil-square fs-5"></i>
        </a>

      <form action="{{ $baseUrl . '/delete/' . $event->id }}" method="POST" class="d-inline delete-form">
    @csrf
    <button type="button"
            class="btn btn-sm btn-outline-danger border-2 delete-btn"
            data-event-id="{{ $event->id }}"
            title="Delete">
        <i class="bi bi-trash fs-5"></i>
    </button>
</form>




    </div>
</td>


                                            </form>
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

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ $baseUrl . '/create' }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <input type="hidden" name="club_id" value="{{ $club->id }}">
        <div class="modal-header">
            <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body px-4">
            {{-- Event Name --}}
            <div class="row mb-3">
                <label for="event_name" class="col-sm-3 col-form-label">Event Name</label>
                <div class="col-sm-9">
                    <input type="text" name="event_name" class="form-control" required>
                </div>
            </div>

            {{-- Description --}}
            <div class="row mb-3">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
            </div>
{{-- Chief Guest --}}
<div class="row mb-3">
    <label for="chief_guest" class="col-sm-3 col-form-label">Chief Guest</label>
    <div class="col-sm-9">
        <input type="text" name="chief_guest" class="form-control" placeholder="Enter Chief Guest name (optional)" value="NA">
    </div>
</div>

            {{-- Start Date & End Date --}}
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Event Dates</label>
                <div class="col-sm-4">
                    <input type="date" name="start_date" class="form-control" required placeholder="Start Date">
                </div>
                <div class="col-sm-4">
                    <input type="date" name="end_date" class="form-control" required placeholder="End Date">
                </div>
            </div>

            {{-- Start Time & End Time --}}
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Event Time</label>
                <div class="col-sm-4">
                    <input type="time" name="start_time" class="form-control" required placeholder="Start Time">
                </div>
                <div class="col-sm-4">
                    <input type="time" name="end_time" class="form-control" required placeholder="End Time">
                </div>
            </div>

            {{-- Participants, Coordinators, Best Performance --}}
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stats</label>
                <div class="col-sm-3">
                    <input type="number" name="participants" class="form-control" placeholder="Participants" required>
                </div>
                <div class="col-sm-3">
                    <input type="number" name="coordinators" class="form-control" placeholder="Coordinators" required>
                </div>
                <div class="col-sm-3">
                    <input type="number" name="best_performance" class="form-control" placeholder="Best Performance" required>
                </div>
            </div>

            {{-- Event Image --}}
            <div class="row mb-3">
                <label for="image" class="col-sm-3 col-form-label">Event Image</label>
                <div class="col-sm-9">
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
            {{-- Winner Name --}}
            <!--div class="row mb-3">
                <label for="winner_name" class="col-sm-3 col-form-label">Winner Name (Optional)</label>
                <div class="col-sm-9">
                    <input type="text" name="winner_name" class="form-control">
                </div>
            </div>

            {{-- Winner Photo --}}
            <div class="row mb-3">
                <label for="winner_photo" class="col-sm-3 col-form-label">Winner Photo (Optional)</label>
                <div class="col-sm-9">
                    <input type="file" name="winner_photo" class="form-control" accept="image/*">
                </div>
            </div-->

            {{-- Gallery Images --}}
            <div class="row mb-3">
                <label for="gallery[]" class="col-sm-3 col-form-label">Gallery Images (Optional)</label>
                <div class="col-sm-9">
                    <input type="file" name="gallery[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">You can select multiple photos</small>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save Event</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
  </div>
</div>
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 rounded-4 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure? <strong>This action cannot be undone.</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
    let deleteForm = null;

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            deleteForm = this.closest('form');
            const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            modal.show();
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (deleteForm) {
            deleteForm.submit();
        }
    });
</script>

@endsection
