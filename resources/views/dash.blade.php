@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <h3 class="text-dark fw-bold mt-0">Club Enrollment Dashboard</h3>
    <p class="text-muted">Live overview of club enrollments by 1st year students</p>
  </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #ffe4ec;">
      <div class="card-body">
        <h5 class="card-title">Total Clubs</h5>
        <h2 class="fw-bold">{{ $totalClubs }}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #fff2e6;">
      <div class="card-body">
        <h5 class="card-title">Total Club Applications</h5>
        <h2 class="fw-bold">{{ $totalApplications }}</h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12">
    <div class="card shadow-sm text-dark" style="background-color: #d2f1f0;">
      <div class="card-body">
        <h5 class="card-title">Total Distinct Students</h5>
        <h2 class="fw-bold">{{ $totalStudents }}</h2>
      </div>
    </div>
  </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3">📊 Department-wise Distribution</h6>
        <canvas id="dept-chart" height="180"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3">🌟 Top 3 Popular Clubs</h6>
        <canvas id="popular-clubs-chart" height="180"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deptData = @json($departmentDistribution);
    const clubData = @json($popularClubs);

    const deptCtx = document.getElementById("dept-chart");
    const clubCtx = document.getElementById("popular-clubs-chart");

    if (deptCtx && deptData && Object.keys(deptData).length) {
      new Chart(deptCtx, {
        type: "bar",
        data: {
          labels: Object.keys(deptData),
          datasets: [{
            label: "Students",
            data: Object.values(deptData),
            backgroundColor: ['#f3e8ff', '#d2f1f0', '#ffe4ec', '#fff7d1', '#d7fcd4']
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

    if (clubCtx && clubData && Object.keys(clubData).length) {
      new Chart(clubCtx, {
        type: "bar",
        data: {
          labels: Object.keys(clubData),
          datasets: [{
            label: "Applications",
            data: Object.values(clubData),
            backgroundColor: ['#c4f0ff', '#fcdada', '#ffe4ec']
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
  });
</script>
@endsection
