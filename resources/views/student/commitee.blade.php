<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Committee Organization Chart</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Prevents scrollbars */
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Full page background image with blur */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset('img/clg1.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, 0.3);
            z-index: -1;
        }
        
        .header {
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 3;
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            height: 60px;
            margin-right: 15px;
        }

        .nav-links {
            display: flex;
            gap: 40px;
        }

        .nav-link {
            text-decoration: none;
            color: #2a5d9f;
            font-weight: 600;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #2a5d9f;
        }

        .nav-link svg {
            width: 30px;
            height: 30px;
            stroke-width: 2.5;
            margin-bottom: 5px;
            transition: stroke 0.3s ease;
        }

        /* Single Foggy Wrapper for heading and chart */
        .chart-wrapper {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(4px);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            width: 85%;
            max-width: 1300px;
            z-index: 2;
        }

        .main-heading {
            color: #2a5d9f;
            text-align: center;
            margin: 0 0 10px;
            font-size: 2.5em;
            font-weight: bold;
        }

        .chart-container {
            position: relative;
            width: 100%; /* Fill the wrapper */
            padding: 10px 0;
            /* Added min-height to ensure the container always covers the entire chart */
            min-height: 400px; 
        }
        
        .node {
            background-color: #fff;
            border: 1px solid #c0e0ff;
            box-shadow: 4px 4px 0px 0px #2a5d9f;
            border-radius: 8px;
            padding: 12px 20px;
            text-align: center;
            font-weight: 600;
            color: #333;
            position: absolute;
            z-index: 10;
            min-width: 180px;
            font-size: 0.9em;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .node:hover {
            transform: scale(1.1) translateX(-50%);
            z-index: 15;
            box-shadow: 6px 6px 0px 0px #2a5d9f;
        }
        .principal:hover { transform: scale(1.1) translateX(-50%); }
        .dean:hover { transform: scale(1.1) translateX(-50%); }
        .hod:hover { transform: scale(1.1) translateX(-50%); }
        .clc:hover { transform: scale(1.1) translateX(-50%); }
        .dlc:hover { transform: scale(1.1) translateX(-50%); }
        .dci:hover { transform: scale(1.1) translateX(-50%); }

        /* Node Positioning */
        .principal { top: 0; left: 50%; transform: translateX(-50%); }
        .dean { top: 85px; left: 20%; transform: translateX(-50%); }
        .hod { top: 85px; left: 80%; transform: translateX(-50%); }
        .clc { top: 170px; left: 20%; transform: translateX(-50%); }
        .dlc { top: 255px; left: 50%; transform: translateX(-50%); }
        .dci { top: 340px; left: 50%; transform: translateX(-50%); }

        /* Connecting lines */
        .line {
            position: absolute;
            z-index: 5;
            background-color: #c0e0ff;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease;
        }

        /* Arrows */
        .line::after {
            content: '';
            position: absolute;
            background-color: #c0e0ff;
            border-radius: 50%;
            width: 6px;
            height: 6px;
            transform: rotate(45deg);
            transition: background-color 0.3s ease;
        }

        /* Line specifics */
        .line.principal-to-middle { top: 50px; left: 50%; width: 3px; height: 35px; }
        .line.principal-to-middle::after { bottom: -3px; left: -1.5px; }
        
        .line.middle-horizontal { top: 87px; left: 20%; width: 60%; height: 3px; }
        .line.middle-horizontal::after { top: -1.5px; right: -3px; }

        .line.dean-to-clc { top: 130px; left: 20%; width: 3px; height: 40px; }
        .line.dean-to-clc::after { bottom: -3px; left: -1.5px; }

        .line.clc-to-dlc-v { top: 215px; left: 20%; width: 3px; height: 40px; }
        .line.clc-to-dlc-v::after { bottom: -3px; left: -1.5px; }
        
        .line.clc-to-dlc-h { top: 257px; left: 20%; width: 30%; height: 3px; }
        .line.clc-to-dlc-h::after { top: -1.5px; right: -3px; }

        .line.hod-to-dlc-v { top: 130px; left: 80%; width: 3px; height: 125px; }
        .line.hod-to-dlc-v::after { bottom: -3px; left: -1.5px; }
        
        .line.hod-to-dlc-h { top: 257px; left: 50%; width: 30%; height: 3px; }
        .line.hod-to-dlc-h::after { top: -1.5px; left: -3px; }

        .line.dlc-to-dci { top: 300px; left: 50%; width: 3px; height: 40px; }
        .line.dlc-to-dci::after { bottom: -3px; left: -1.5px; }

        /* Hover states for lines */
        .principal:hover ~ .principal-to-middle { background-color: #2a5d9f; }
        .principal:hover ~ .principal-to-middle::after { background-color: #2a5d9f; }

        .dean:hover ~ .dean-to-clc,
        .dean:hover ~ .middle-horizontal { background-color: #2a5d9f; }
        .dean:hover ~ .dean-to-clc::after,
        .dean:hover ~ .middle-horizontal::after { background-color: #2a5d9f; }

        .hod:hover ~ .hod-to-dlc-v,
        .hod:hover ~ .middle-horizontal { background-color: #2a5d9f; }
        .hod:hover ~ .hod-to-dlc-v::after,
        .hod:hover ~ .middle-horizontal::after { background-color: #2a5d9f; }

        .clc:hover ~ .clc-to-dlc-v,
        .clc:hover ~ .clc-to-dlc-h { background-color: #2a5d9f; }
        .clc:hover ~ .clc-to-dlc-v::after,
        .clc:hover ~ .clc-to-dlc-h::after { background-color: #2a5d9f; }

        .dlc:hover ~ .clc-to-dlc-h,
        .dlc:hover ~ .hod-to-dlc-h,
        .dlc:hover ~ .dlc-to-dci { background-color: #2a5d9f; }
        .dlc:hover ~ .clc-to-dlc-h::after,
        .dlc:hover ~ .hod-to-dlc-h::after,
        .dlc:hover ~ .dlc-to-dci::after { background-color: #2a5d9f; }

        .dci:hover ~ .dlc-to-dci { background-color: #2a5d9f; }
        .dci:hover ~ .dlc-to-dci::after { background-color: #2a5d9f; }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

     <!-- Normal Header (static) -->
    <div style="
  width: 100%;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  /* NO position: fixed or sticky */
  height: max-content;
">
        <div class="container d-flex align-items-center justify-content-between py-3">

            <!-- Logo -->
            <a href="index.html" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo" style="height: 60px;">
            </a>

            <!-- Navigation Links -->
            <div style="display: flex; gap: 40px;">
                <a href="{{ route('student.index') }}" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
                </a>
               <a href="{{ route('student.commitee') }}" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#W91G11; width:36px; height:36px;"></i><br>Commitee
                </a>
                <a href="{{ route('student.clubs.all') }}" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#E76F51; width:36px; height:36px;"></i><br>Clubs
                </a>
                <a href="{{ route('student.events') }}" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="calendar" style="stroke:#E9C46A; width:36px; height:36px;"></i><br>Events
                </a>
                <a href="{{ route('student.enroll.form') }}" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="edit-3" style="stroke:#F4A261; width:36px; height:36px;"></i><br>Enroll
                </a>
                

            </div>

        </div>
    </div>

    <!-- No extra padding needed because header is static -->

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
    feather.replace()
    </script>

    <div class="chart-wrapper">
        <h1 class="main-heading">Organization Chart</h1>

        <div class="chart-container">
            <div class="node principal">Principal</div>
            <div class="node dean">Dean</div>
            <div class="node hod">HOD</div>
            <div class="node clc">College Level Coordinator</div>
            <div class="node dlc">Department Level Coordinator</div>
            <div class="node dci">Department Club Incharge</div>

            <div class="line principal-to-middle"></div>
            <div class="line middle-horizontal"></div>
            <div class="line dean-to-clc"></div>
            <div class="line clc-to-dlc-v"></div>
            <div class="line clc-to-dlc-h"></div>
            <div class="line hod-to-dlc-v"></div>
            <div class="line hod-to-dlc-h"></div>
            <div class="line dlc-to-dci"></div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
<!-- Footer Start -->
<footer style="background-color: #800000; color: white; padding: 15px 0; font-size: 14px;">
  <div class="container px-3">

    <div class="row g-4 text-center text-md-start align-items-start">

      <!-- Contact Us -->
      <div class="col-md-4">
        <h6 class="mb-2" style="color: white; font-weight:700;">Contact Us</h6>
        <p class="mb-3">
          <span style="font-weight:700; color:white;">Principal</span><br>
          <span style="font-weight:600; color:white;">Dr. L. Ashok Kumar</span><br>
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="mailto:principal@tce.edu" 
             style="color: #ff9999; text-decoration:none;" 
             onmouseover="this.style.textDecoration='underline'" 
             onmouseout="this.style.textDecoration='none'">
             principal@tce.edu
          </a>
        </p>
        <p class="mb-0">
          <span style="font-weight:700; color:white;">Dean - Student Affairs</span><br>
          <span style="font-weight:600; color:white;">Dr. G. Balaji</span><br>
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="mailto:gbarch@tce.edu" 
             style="color: #ff9999; text-decoration:none;" 
             onmouseover="this.style.textDecoration='underline'" 
             onmouseout="this.style.textDecoration='none'">
             gbarch@tce.edu
          </a>
        </p>
        <p class="mb-0">
          <span style="font-weight:700; color:white;">College level co-ordinator</span><br>
          <span style="font-weight:600; color:white;">Dr. P. Ramkumar</span><br>
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="mailto:prrchem@tce.edu" 
             style="color: #ff9999; text-decoration:none;" 
             onmouseover="this.style.textDecoration='underline'" 
             onmouseout="this.style.textDecoration='none'">
             prrchem@tce.edu
          </a>
        </p>
      </div>

      <!-- Developed By -->
      <div class="col-md-4">
        <h6 class="mb-2" style="color: white; font-weight:700;">Developed By</h6>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Aburvaa A S</span></p>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Harshini J G</span></p>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Kiruthika B</span></p>
        <p class="mb-1"><span style="font-weight:700; color:#ff9999;">Nikitha A S</span></p>
        <p class="mb-2"><span style="font-weight:700; color:#ff9999;">Varshini C</span></p>

        <p class="mt-2 mb-1" style="color:white; font-weight:700;">Department of Information Technology</p>
<p class="mb-0" style="color:white; line-height:1.6;">
  With Guidance from 
  <span style="font-weight:600; color:#ff9999;">Dr. C. Deisy</span>, Head of Department, 
  <span style="font-weight:600; color:#ff9999;">Dr. K. V. Uma</span>, Assistant Professor, 
  <span style="font-weight:600; color:#ff9999;">Mrs. A. Indirani</span>, Assistant Professor
</p>

      </div>

      <!-- Google Map -->
      <div class="col-md-4">
        <h6 class="mb-2" style="color: white; font-weight:700;">Our Location</h6>
        <div class="ratio ratio-16x9 rounded" style="height: 120px; overflow: hidden;">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15722.598045886074!2d78.07186475545656!3d9.87974334043231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c58f98cfb84d%3A0x29f51efea3e84bf2!2sThiagarajar%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1753094148686!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>
    </div>

    <!-- Social & PDF Download -->
    <div class="row mt-3 text-center">
      <div class="col">
        <h6 class="mb-2" style="color: white; font-weight:700;">Connect With Us</h6>
        <a href="https://www.facebook.com/TheOfficialTCEPage" class="me-2" style="color: white;"><i class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/tce_madurai/" class="me-2" style="color: white;"><i class="fab fa-instagram"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-linkedin-in"></i></a>

        <!-- PDF Download -->
        <div class="mt-2">
          <a href="{{ asset('assets/MANUAL.pdf') }}" download class="btn btn-outline-light btn-sm py-1 px-2" style="font-size: 12px;">
            <i class="fas fa-file-pdf me-1"></i> Download Student Manual
          </a>
        </div>
      </div>
    </div>

    <hr class="my-2" style="border-color: #B34747;">
    <div class="text-center small" style="font-size: 12px;">
      &copy; 2025 TCE College. All Rights Reserved.
    </div>
  </div>
</footer>

</body>
</html>