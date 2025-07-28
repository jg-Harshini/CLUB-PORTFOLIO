<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Club Enrollment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

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

        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
            padding: 10px 0;
        }

        .nav-item {
            text-align: center;
            color: #333;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-item:hover {
            color: #0d6efd;
        }

        .form-wrapper {
            margin-top: 120px;
        }

        .container-form {
            max-width: 720px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.96);
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
        }

        label {
            margin-top: 15px;
            font-weight: 500;
            color: #444;
        }
        /* Main form labels (bold) */
label:not(.form-check-label) {
    margin-top: 15px;
    font-weight: bold;
    color: #444;
        text-transform: uppercase;

}

/* Checkbox labels (keep previous look) */
.form-check-label {
    font-weight: 500;
    color: #444;
}


        input[type="text"],
        input[type="email"],
        input[type="file"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 10px;
        }

        .form-check-label {
            cursor: pointer;
        }

        button {
            background: #5a9bd3;
            color: white;
            border: none;
            padding: 12px 20px;
            margin-top: 25px;
            width: 100%;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
.alert-box-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 60px;
}

.alert-box {
    background-color: #fff3cd;
    color: #856404;
    padding: 20px 40px;
    border: 2px solid #ffeeba;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    max-width: 700px;
    text-align: center;
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
}

        button:hover {
            background: #417cb9;
        }

        @media (max-width: 768px) {
            .container-form {
                margin: 20px;
            }

            .navbar-custom .container {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
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
            <a href="{{ route('student.index') }}"class="d-flex align-items-center text-decoration-none">
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
                <a href="about.html" class="nav-item"
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


@if(session('popup_message'))
    <div id="popupOverlay" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0.4); z-index: 2000; display: flex; justify-content: center; align-items: center;">
        <div style="background: white; padding: 30px 40px; border-radius: 15px; text-align: center; max-width: 500px; box-shadow: 0 8px 30px rgba(0,0,0,0.3);">
            <h4 style="margin-bottom: 20px;">{{ session('popup_message') }}</h4>
        </div>
    </div>

    <script>
        setTimeout(function () {
            window.location.href = "{{ route('student.index') }}";
        }, 2000); // Redirect after 3 seconds
    </script>
@endif


<script>
    function handleAlertClose() {
        const redirectTo = "{{ session('redirect_to') }}";
        if (redirectTo) {
            window.location.href = redirectTo;
        } else {
            document.getElementById('customAlert').style.display = 'none';
        }
    }
</script>




    <!-- Enrollment Form -->
    <div class="container-form form-wrapper">
        <h2>Club Enrollment</h2>

       

<form id="clubForm" action="{{ route('student.enroll.submit') }}" method="POST" enctype="multipart/form-data" autocomplete="off">

    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <div class="row">
        <div class="col-md-6">
            <label>Roll Number/Register Number:</label>
            <input type="text" name="roll_no" maxlength="6" class="form-control" value="{{ old('roll_no') }}" required>
        </div>
        
    </div>

  <div class="row">
    <div class="col-md-6">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="col-md-6">
        <label>Gender:</label>
        <select name="gender" class="form-select" required>
            <option value="" disabled selected>Select gender</option>
            <option value="Male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
</div>

    <label>Department:</label>
    <select name="department" class="form-select" required>
        <option value="" disabled selected>Select your department</option>
        @foreach ($departments as $dept)
            <option value="{{ $dept }}" {{ old('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
        @endforeach
    </select>

    <label>Select Clubs (Min: 1 Tech + 1 Non-Tech | Max: 2 Tech + 1 Non-Tech):</label>
<br>
<label>Technical Clubs</label>
<div class="checkbox-group">
    @foreach($clubs->where('category', 'technical') as $club)
        <label class="form-check-label">
            <input type="checkbox" name="clubs[]" value="{{ $club->id }}" class="form-check-input club-checkbox" data-type="tech"
                {{ is_array(old('clubs')) && in_array($club->id, old('clubs')) ? 'checked' : '' }}>
            {{ $club->club_name }}
        </label>
    @endforeach
</div>

<label>Non-Technical Clubs</label>
<div class="checkbox-group">
    @foreach($clubs->where('category', 'non-technical') as $club)
        <label class="form-check-label">
            <input type="checkbox" name="clubs[]" value="{{ $club->id }}" class="form-check-input club-checkbox" data-type="nontech"
                {{ is_array(old('clubs')) && in_array($club->id, old('clubs')) ? 'checked' : '' }}>
            {{ $club->club_name }}
        </label>
    @endforeach
</div>


    <button type="submit">Submit</button>
</form>



<script>
    feather.replace();

    function showCustomAlert(message) {
        let alertBox = document.getElementById('customAlert');
        if (!alertBox) {
            alertBox = document.createElement('div');
            alertBox.id = 'customAlert';
            alertBox.style = `position: fixed; top: 0; left: 0; height: 100vh; width: 100vw; background: rgba(0,0,0,0.4); z-index: 2000; display: flex; justify-content: center; align-items: center;`;

            alertBox.innerHTML = `
                <div style="background: white; padding: 30px 40px; border-radius: 15px; text-align: center; max-width: 500px; box-shadow: 0 8px 30px rgba(0,0,0,0.3);">
                    <h4 id="validationMessage" style="margin-bottom: 20px;">${message}</h4>
                    <button onclick="document.getElementById('customAlert').style.display = 'none';"
                            style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 8px;">
                        OK
                    </button>
                </div>
            `;
            document.body.appendChild(alertBox);
        } else {
            alertBox.querySelector('h4').innerText = message;
            alertBox.style.display = 'flex';
        }
    }

    const form = document.getElementById("clubForm");
    const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');

    allCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const selectedTech = document.querySelectorAll('input[data-type="tech"]:checked');
            const selectedNonTech = document.querySelectorAll('input[data-type="nontech"]:checked');

            if (selectedTech.length > 2) {
                showCustomAlert("You can select a maximum of 2 Technical clubs.");
                checkbox.checked = false;
            }

            if (selectedNonTech.length > 1) {
                showCustomAlert("You can select a max of 1 Non-Technical club.");
                checkbox.checked = false;
            }
        });
    });

    // ✅ Move this OUTSIDE the checkbox loop
    form.addEventListener("submit", function (event) {
        const selectedTech = document.querySelectorAll('input[data-type="tech"]:checked');
        const selectedNonTech = document.querySelectorAll('input[data-type="nontech"]:checked');

        if (selectedTech.length === 0 || selectedNonTech.length === 0) {
            event.preventDefault();
            showCustomAlert("Please select at least 1 Technical and 1 Non-Technical club.");
        }
    });
</script>



    </div>

  <!-- Footer Start -->
<footer style="background-color: #800000; color: white; padding: 10px 0; font-size: 14px;">
  <div class="container px-3">

    <div class="row g-3 text-center text-md-start align-items-start">

      <!-- Contact Info -->
      <div class="col-md-4">
        <h6 class="mb-1" style="color: #ff9999;">Contact Info</h6>
        <p class="mb-1">
          <i class="fa fa-map-marker-alt me-2" style="color: #ff9999;"></i>
          V3JJ+VJ3, Thiruparankundram, TamilNadu 625015
        </p>
        <p class="mb-1">
          <i class="fas fa-envelope me-2" style="color: #ff9999;"></i>
          <a href="https://www.tce.edu" style="color: white; text-decoration: none;">www.tce.edu</a>
        </p>
        <p class="mb-0">
          <i class="fas fa-phone me-2" style="color: #ff9999;"></i>
          +91 452 2482240
        </p>
      </div>

      <!-- Developed By -->
      <div class="col-md-4">
        <h6 class="mb-1" style="color: #ff9999;">Developed By</h6>
        <p class="mb-1">Aburvaa A S, Harshini J G</p>
        <p class="mb-1">Kiruthika B, Nikitha A S, Varshini C</p>
        <p class="mb-0">3rd Year IT Department,Thiagarajar College of Engineering.</p>
      </div>

      <!-- Google Map -->
      <div class="col-md-4">
        <h6 class="mb-1" style="color: #ff9999;">Our Location</h6>
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
        <h6 class="mb-2" style="color: #ff9999;">Connect With Us</h6>
        <a href="https://www.facebook.com/TheOfficialTCEPage" class="me-2" style="color: white;"><i class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/tce_madurai/" class="me-2" style="color: white;"><i class="fab fa-instagram"></i></a>
        <a href="https://x.com/tceofficialpage" class="me-2" style="color: white;"><i class="fab fa-linkedin-in"></i></a>

        <!-- PDF Download -->
        <div class="mt-2">
          <a href="{{ asset('assets\MANUAL.pdf') }}" download class="btn btn-outline-light btn-sm py-1 px-2" style="font-size: 12px;">
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