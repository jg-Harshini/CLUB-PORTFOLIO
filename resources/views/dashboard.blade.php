@extends('layout.clubadmin')
@section('title', 'IOT Club Dashboard')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <<h3 class="text-dark fw-bold mt-0">{{ $clubName }} Dashboard</h3>
<p class="text-muted">Analytics for department and gender distribution within the {{ $clubName }}</p>

  </div>
</div>
<!-- Total Student Registrations -->
<div class="row mb-4">
  <div class="col-lg-12">
    <div class="card shadow-sm text-dark" style="background-color: #e0f7fa;">
      <div class="card-body text-center">
        <h5 class="card-title">Total Student Registrations</h5>
        <h2 class="fw-bold">{{ $totalStudents }}</h2>
      </div>
    </div>
  </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
  <!-- Department-wise Distribution -->
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center"  style="height: 430px;">
<h6 class="fw-semibold mb-3">Department-wise Distribution ({{ $clubName }})</h6>
        <canvas id="dept-chart" height="180"></canvas>
      </div>
    </div>
  </div>

  <!-- Gender Distribution -->
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center"  style="height: 430px;">
<h6 class="fw-semibold mb-3">Gender Distribution ({{ $clubName }})</h6>
        <div style="height: 320px; display: flex; align-items: center; justify-content: center;">
          <canvas id="gender-chart" width="300" height="300"></canvas>
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
  const deptData = @json($departmentDistribution);
  const genderData = @json($genderDistribution);


  const deptCtx = document.getElementById("dept-chart");
  const genderCtx = document.getElementById("gender-chart");

  if (deptCtx) {
    new Chart(deptCtx, {
      type: "bar",
      data: {
        labels: Object.keys(deptData),
        datasets: [{
          label: "Students",
          data: Object.values(deptData),
          backgroundColor: ['#2E8B57', '#1E90FF', '#FF8C00', '#6A5ACD']
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false }},
        scales: {
          y: {
            beginAtZero: true,
            ticks: { precision: 0, color: '#333', font: { weight: 'bold', size: 12 }}
          }
        }
      }
    });
  }

  if (genderCtx) {
    new Chart(genderCtx, {
      type: "pie",
      data: {
        labels: Object.keys(genderData),
        datasets: [{
          data: Object.values(genderData),
          backgroundColor: ['#007BFF', '#FF69B4']
        }]
      },
      options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
          tooltip: { bodyFont: { weight: 'bold', size: 13 }}
        }
      }
    });
  }
});
</script>
@endsection
