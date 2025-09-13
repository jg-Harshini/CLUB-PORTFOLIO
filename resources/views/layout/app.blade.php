<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin Panel</title>
    <!-- Trix Editor CDN -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #00264d;
            color: white;
            flex-shrink: 0;
        }

        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #003366;
        }

        .dropdown-menu a {
            color: rgb(7, 41, 74) !important;
            background-color: white !important;
        }

        .dropdown-menu a:hover,
        .dropdown-menu a:focus,
        .dropdown-menu a:active {
            color: white !important;
            background-color: #1a5597 !important;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f4f6f8;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
     
    <div class="sidebar p-3">
    <!-- Logo -->
<img src="{{ asset('img/logo1.png') }}" alt="Logo"
     class="img-fluid mb-2 d-block mx-auto"
     style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">

    <!-- Title -->
    <h4 class="mt-2 text-center">Super Admin Panel</h4>
    <hr>

    <a href="{{ route('superadmin.dashboard') }}"> Dashboard</a>

    <div class="dropdown mb-3">
        <a class="dropdown-toggle d-block text-white" href="#" role="button"
           id="manageClubDropdown" data-bs-toggle="dropdown" aria-expanded="false">
             Manage Clubs
        </a>
        <ul class="dropdown-menu" aria-labelledby="manageClubDropdown">
            <li><a class="dropdown-item" href="{{ route('superadmin.clubs') }}">View Clubs</a></li>
            <li><a class="dropdown-item" href="{{ route('superadmin.clubs', ['action' => 'create']) }}">Add Club</a></li>
        </ul>
    </div>

    <a href="{{ route('superadmin.enrollments') }}"> Enrollments</a>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
    </form>
</div>

    

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>
    
</div>

<!-- Bootstrap Bundle (includes Popper for dropdowns) -->
     <!-- ✅ Required Bootstrap JS (MUST be present) -->
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AMvyTG2PdtsYYqD1xqXbB+g1Q9ct"
        crossorigin="anonymous"></script>
        <!-- JS Scripts -->
        <!-- 🔒 Admin Security JavaScript -->
        <script src="{{ asset('js/admin-security.js') }}"></script>

@yield('scripts')

</body>
</html>