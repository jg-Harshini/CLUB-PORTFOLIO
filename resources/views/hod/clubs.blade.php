@extends('layout.hod')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Clubs in {{ $department }} Department</h3>

    @if($clubs->count())
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Club Name</th>
                    <th>Coordinator</th>
                    <th>Year of Start</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clubs as $club)
                    <tr>
                        <td>{{ $club->club_name }}</td>
                        <td>{{ $club->staff_coordinator_name ?? 'N/A' }}</td> <!-- adjust if relationship used -->
                        <td>{{ $club->year_started ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('hod.clubs.show', $club->id) }}" class="btn btn-info">View</a>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No clubs found.</div>
    @endif
</div>
@endsection
