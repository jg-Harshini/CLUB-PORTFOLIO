@extends('layout.hod') {{-- or layout.hod if yours is different --}}

@section('title', 'HOD Dashboard')

@section('content')
<div class="row mb-4">
  <div class="col-12">
<h3 class="text-dark fw-bold mt-0">HOD Dashboard - {{ $departmentName }}</h3>
    <p class="text-muted">Overview of your department’s club enrollments and events</p>
  </div>
</div>

<div class="row mb-4">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #e74563ff;">
      <div class="card-body">
        <h5 class="card-title">Total Clubs</h5>
        <h2 class="fw-bold">{{ $totalClubs }}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #e0a250ff;">
      <div class="card-body">
        <h5 class="card-title">Total Club Applications</h5>
        <h2 class="fw-bold">{{ $totalApplications }}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12">
    <div class="card shadow-sm text-dark" style="background-color: #209178ff;">
      <div class="card-body">
        <h5 class="card-title">Total Distinct Students</h5>
        <h2 class="fw-bold">{{ $totalStudents }}</h2>
      </div>
    </div>
  </div>
</div>

<!-- Popular Clubs and Active Events -->
<div class="row mb-4">
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3">Top 3 Popular Clubs</h6>
        <canvas id="popular-clubs-chart" height="180"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3">Most Active Clubs by Events</h6>
        <canvas id="active-club-events-chart" height="180"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Gender Distribution -->
<div class="row mb-4">
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3">Gender Distribution</h6>
        <div style="height: 320px; display: flex; align-items: center; justify-content: center;">
          <canvas id="gender-chart" width="250" height="250"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const clubData = @json($popularClubs);
    const activeClubEvents = @json($activeClubsByEvents);
    const genderData = @json($genderDistribution);

    const clubCtx = document.getElementById("popular-clubs-chart");
    const activeClubCtx = document.getElementById("active-club-events-chart");
    const genderCtx = document.getElementById("gender-chart");

    if (clubCtx && Object.keys(clubData).length) {
      new Chart(clubCtx, {
        type: "bar",
        data: {
          labels: Object.keys(clubData),
          datasets: [{
            label: "Applications",
            data: Object.values(clubData),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'] // bright pink, blue, yellow
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: false }
          }
        }
      });
    }

    if (activeClubCtx && Object.keys(activeClubEvents).length) {
      new Chart(activeClubCtx, {
        type: "bar",
        data: {
          labels: Object.keys(activeClubEvents),
          datasets: [{
            label: "Events",
            data: Object.values(activeClubEvents),
            backgroundColor: ['#4BC0C0', '#9966FF', '#FF9F40'] // bright teal, purple, orange
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: false }
          }
        }
      });
    }

    if (genderCtx && Object.keys(genderData).length) {
      new Chart(genderCtx, {
        type: "pie",
        data: {
          labels: Object.keys(genderData),
          datasets: [{
            data: Object.values(genderData),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'] // same bright palette
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              labels: {
                font: { size: 14 }
              }
            }
          }
        }
      });
    }
  });
</script>
@endsection
