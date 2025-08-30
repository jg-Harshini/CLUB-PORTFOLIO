<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>TCE CLUB PORTFOLIO</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<!-- Google fonts (keep) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

<!-- Font Awesome (single) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- Bootstrap (single, 5.3) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


<!-- Third-party libs -->
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- keep your custom style last -->



    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


</head>


<style>
.enroll-button {
    display: inline-block;
    padding: 12px 30px;
    font-size: 18px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    color: white;
    background: linear-gradient(135deg, #00b894, #0984e3);
    border: none;
    border-radius: 50px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
}

.enroll-button:hover {
    background: linear-gradient(135deg, #0984e3, #00b894);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
    transform: translateY(-3px);
    color: white;
}

.box {
    color: white;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 7px;
}

.box.small {
    width: 250px;
    height: 250px;
}

.box.wide {
    width: 400px;
    height: 250px;
}

.box.red {
    background-color: #e63946;
}

.box.orange {
    background-color: #f4a261;
}

.box.green {
    background-color: #2a9d8f;
}

.box.blue {
    background-color: #264653;
}

.plus-icon-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background-color: #800000;
    color: white;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 28px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    transition: 0.3s ease-in-out;
    z-index: 9999;
}
.service-img {
        height: 200px;
        overflow: hidden;
    }

    .service-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn-maroon {
        background-color:white;
        color: black;
        border-radius: 50px;
        padding: 10px 25px;
        text-decoration: none;
        border: none;
        transition: background-color 0.3s;
        border: 1px solid black; 
    }
    .btn-maroon:hover {
        background-color: #a52a2a;
        color: white;
        border: white;
    }
.plus-icon-btn:hover {
    background-color: #a00000;
    transform: scale(1.05);
}

.admin-login-box {
    position: fixed;
    bottom: 100px;
    right: 30px;
    background-color: white;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 12px;
    width: 250px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    z-index: 9999;
}

.box.image-box {
    padding: 0;
    overflow: hidden;
    border-radius: 7px;
}

.box.image-box img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 7px;
}

.row.custom-gutter {
    margin-left: -0.25rem;
    margin-right: -0.25rem;
    justify-content: center;
}

.row.custom-gutter>[class*='col-'] {
    padding-left: 0.25rem;
    padding-right: 0.25rem;
    display: flex;
    justify-content: center;
}

.row.custom-gutter+.row.custom-gutter {
    margin-top: 1rem;
}

.club-text h5 {

    margin-bottom: 10px;
    letter-spacing: 0.8px;
    font-weight: 600;
    font-size: 1rem;
}

.club-text h1 {
    color: #800000;
    font-size: 2rem;
    line-height: 1.3;
    margin-bottom: 15px;
}

.club-text p {
    color: black;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 0;
}

.add-club-btn {
    width: 60px;
    height: 60px;
    font-size: 30px;
    border-radius: 50%;
    background-color: white;
    color: black;
    border: 2px solid black;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s ease;
}

.add-club-btn:hover {
    background-color: #800000;
    color: white;
    border-color: #800000;
}
.club-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 50px 40px;
      padding: 0 15px;
    }

    .club-card {
      position: relative;
      width: 100%;
      aspect-ratio: 1 / 1;
      background-color: #f8f9fa;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease-in-out;
    }

    .club-card:hover {
      transform: translateY(-8px);
    }

    .club-card img {
      width: 100%;
      height: 100%;
      object-fit: wrap;
      transition: transform 0.4s ease, filter 0.4s ease;
    }

    .club-card:hover img {
      transform: scale(1.1);
      filter: blur(3px) brightness(70%);
    }

    .club-name-overlay {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: #063c64;
      color: white;
      font-weight: bold;
      padding: 10px 0;
      font-size: 1.05rem;
      z-index: 1;
    }

    .club-details {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 75%;
      background-color: rgba(255, 255, 255, 0.97);
      padding: 15px 15px 10px;
      text-align: center;
      opacity: 0;
      transform: translateY(100%);
      transition: all 0.4s ease-in-out;
      z-index: 2;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .club-card:hover .club-details {
      opacity: 1;
      transform: translateY(0%);
    }

    .club-details h5 {
      color: #800000;
      font-weight: 700;
      font-size: 1.05rem;
      margin-bottom: 8px;
    }

    .club-details p {
      font-size: 0.9rem;
      color: #333;
      line-height: 1.3;
      max-height: 60px;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .club-details a {
      padding: 7px 20px;
      background-color: #800000;
      color: white;
      border-radius: 25px;
      font-size: 0.85rem;
      text-decoration: none;
      transition: background-color 0.3s ease;
      align-self: center;
    }

    .club-details a:hover {
      background-color: #a52a2a;
    }

    @media (max-width: 768px) {
      .club-section h1 {
        font-size: 1.7rem;
      }
    }

    @media (max-width: 576px) {
      .club-card {
        aspect-ratio: 3 / 3;
      }
    }
    
</style>



<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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

    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox" style="height: 500px; overflow: hidden;background: #fafafa">
                <div class="carousel-item active" style="height: 500px;">
                    <img src="{{ asset('img/clg1.jpg') }}" class="d-block w-100" alt="Image"
                        style="height: 500px; object-fit: contain;">
                </div>
                <div class="carousel-item" style="height: 500px;">
                    <img src="{{asset('img/clg2.jpg')}}" class="d-block w-100" alt="Image"
                        style="height: 500px; object-fit: contain;">
                </div>
                <div class="carousel-item" style="height: 500px;">
                    <img src="{{asset('img/b4_PhotoGrid.png')}}" class="d-block w-100" alt="Image"
                        style="height: 500px; object-fit:contain;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <div class="container-fluid py-3">
        <div class="container py-3">

            <!-- Text Section: Appears first, centered -->
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <div class="club-text">
                        <h5>Clubs at TCE</h5>
                        <h1>A Vibrant Hub for Innovation, Culture, and Community</h1>
                        <p>
                            TCE's clubs foster a dynamic environment where technology, social causes, and cultural
                            passions thrive side by side.
                            From cutting-edge tech innovation groups to spirited cultural and social clubs, students
                            find endless opportunities to connect, learn, and lead.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Boxes Section: Appears after, centered -->
            <div class="row justify-content-center">

                <!-- First Row -->
                <div class="col-auto mb-3" data-aos="fade-right" data-aos-duration="1000">
                    <div class="box red small">Innovate, code, and build the future with cutting-edge tech and hands-on
                        workshops!</div>
                </div>
                <div class="col-auto mb-3" data-aos="fade-down" data-aos-duration="1000">
                    <div class="box orange small">Turn ideas into reality — join the makers, creators, and startup
                        dreamers!</div>
                </div>
                <div class="col-auto mb-3" data-aos="fade-left" data-aos-duration="1000">
                    <div class="box image-box wide">
                        <img src="{{asset('img/WhatsApp Image 2025-06-08 at 17.53.57_20a7efab.jpg')}}" alt="Image 1" />
                    </div>
                </div>

                <!-- Second Row -->
                <div class="col-auto mb-0" data-aos="fade-right" data-aos-duration="1500">
                    <div class="box image-box wide">
                        <img src="{{asset('img/w1.jpg')}}" alt="Image 2" />
                    </div>
                </div>
                <div class="col-auto mb-3" data-aos="fade-up" data-aos-duration="1500">
                    <div class="box green small">From engines to robots — design, create, and bring machines to life
                        these</div>
                </div>
                <div class="col-auto mb-3" data-aos="fade-left" data-aos-duration="1500">
                    <div class="box blue small">Express your passion — dance, debate, compete, and shine on every stage
                        and field!</div>
                </div>
            </div>

        </div>
    </div>

    <!-- AOS and Bootstrap JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Counter/Waypoint Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/counterup2@1.0.7/dist/index.min.js"></script>




    

    <!-- Services Start -->
    <div class="container-fluid service overflow-hidden pt-2">
        <div class="container py-2">
            <div class="section-title text-center mb-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Clubs</h5>
                </div>
                <h1 class="display-5 mb-4">Explore the clubs at TCE</h1>
                <p class="mb-0">Explore the vibrant student clubs at TCE that spark innovation, leadership, and
                    creativity.</br>Join communities that empower you beyond academics through tech, culture, and more.
                </p>
            </div>
                 <div class="club-grid">
    @foreach($clubs->take(12) as $club)
      <div class="club-card" data-aos="fade-up">
        <img src="{{ asset('storage/' . $club->logo) }}" alt="{{ $club->club_name }}">
        <div class="club-name-overlay" style="text-align: center";>{{ $club->club_name }}</div>
        <div class="club-details">
          <h5>{{ $club->club_name }}</h5>
          <p>{{ \Illuminate\Support\Str::limit($club->introduction, 120) }}</p>
          <a href="{{ route('student.clubs.show', ['id' => $club->id]) }}">Explore More</a>
        </div>
      </div>
    @endforeach
  </div>
{{-- View More Button --}}
<div class="text-center mt-4">
        <a href="{{ route('student.clubs.all') }}" class="carousel-btn">View More</a>
    </div>
</div>

<br>
<br>
<!-- Counter Facts Start -->
    <div class="container-fluid py-5" style="background-color: #800000;">
        <div class="container py-5">
            <div class="row g-4 justify-content-center text-center">

                <!-- Counter Box -->
                <div class="col-12 col-sm-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="fas fa-layer-group fa-3x mb-3" style="color: #b8860b;"></i>
                        <h5 class="fw-semibold mb-2" style="color: #b8860b;">Clubs</h5>
<h2 class="mb-0 fw-bold counter" data-target="{{ $clubsCount }}" style="color: #333;">0</h2>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="fas fa-users fa-3x mb-3" style="color: #b8860b;"></i>
                        <h5 class="fw-semibold mb-2" style="color: #b8860b;">Members</h5>
<h2 class="mb-0 fw-bold counter" data-target="{{ $membersCount }}" style="color: #333;">0</h2>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="far fa-calendar-alt fa-3x mb-3" style="color: #b8860b;"></i>
                        <h5 class="fw-semibold mb-2" style="color: #b8860b;">Events</h5>
<h2 class="mb-0 fw-bold counter" data-target="{{ $eventsCount }}" style="color: #333;">0</h2>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="fas fa-lightbulb fa-3x mb-3" style="color: #b8860b;"></i>
                        <h5 class="fw-semibold mb-2" style="color: #b8860b;">Patents</h5>
<h2 class="mb-0 fw-bold counter" data-target="{{ $patentsCount }}" style="color: #333;">0</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Counter Facts End -->

    <!-- Counter Script -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                const speed = 100; // Lower is faster
                const increment = Math.ceil(target / speed);

                if (count < target) {
                    counter.innerText = count + increment;
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    });
    </script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<style>
    .swiper {
        width: 100%;
        padding-top: 20px;
        padding-bottom: 40px;
    }

    .swiper-slide {
        text-align: center;
        height: auto;
    }

    .event-slide {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        height: 300px;
    }

    .event-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .event-info {
        position: absolute;
        bottom: -100%;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 15px;
        transition: bottom 0.4s ease-in-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .event-slide:hover .event-info {
        bottom: 0;
    }

    .event-slide:hover img {
        transform: scale(1.1);
    }

    .carousel-btn {
        background-color: #800000;
        color: white;
        border-radius: 50px;
        padding: 10px 25px;
        text-decoration: none;
        border: 1px solid black;
        transition: background-color 0.3s;
    }

    .carousel-btn:hover {
        background-color: #a52a2a;
        color: white;
    }
</style>

<!-- Carousel Section -->
<div class="container py-5">
    <h2 class="text-center mb-4">Featured Events</h2>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($events as $event)
                <div class="swiper-slide">
                    <div class="event-slide">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->event_name }}">
                        <div class="event-info">
                            <h5>{{ $event->event_name }}</h5>
                            <p>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}
            to
            {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</p>
                            <p>{{ $event->club->club_name }}</p>
                            <div class="text-center mt-4 mb-5">
    <a href="{{ route('student.event.details', $event->id) }}" class="btn-maroon">View Details</a>
</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('student.events') }}" class="carousel-btn">Explore More</a>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 600,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        }
    });
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


                <!-- Back to Top -->
                <a href="#" class="btn btn-primary btn-lg-square back-to-top"
                    style="width: 40px; height: 40px; font-size: 16px;">
                    <i class="fa fa-arrow-up"></i>
                </a>



                <!-- JavaScript Libraries -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="{{asset('lib/wow/wow.min.js')}}"></script>
                <script src="{{asset('lib/easing/easing.min.js')}}"></script>
                <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
                <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
                <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>


                <!-- Template Javascript -->
                <script src="{{asset('js/main.js')}}"></script>
               

</body>




</html>