<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Club Enrollment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Feather Icons -->
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
<div id="personalDetailsStep">
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
<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
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
      <button type="button" id="nextBtn">Next</button>
</div>
<div id="clubSelectionStep" style="display:none;">
  <div id="clubLimitInfo"></div>


    <label>Select Clubs (2 Tech + 1 Non-Tech):</label>
<br>
<label>Technical Clubs</label>
<div class="checkbox-group">
    @foreach($clubs->where('category', 'technical') as $club)
        <label class="form-check-label">
            <input type="checkbox" name="clubs[]" value="{{ $club->id }}" class="form-check-input club-checkbox" data-type="technical"
                {{ is_array(old('clubs')) && in_array($club->id, old('clubs')) ? 'checked' : '' }}>
            {{ $club->club_name }}
        </label>
    @endforeach
</div>

<label>Non-Technical Clubs</label>
<div class="checkbox-group">
    @foreach($clubs->where('category', 'non-technical') as $club)
        <label class="form-check-label">
            <input type="checkbox" name="clubs[]" value="{{ $club->id }}" class="form-check-input club-checkbox" data-type="non-technical"
                {{ is_array(old('clubs')) && in_array($club->id, old('clubs')) ? 'checked' : '' }}>
            {{ $club->club_name }}
        </label>
    @endforeach
</div>


    <button type="submit">Submit</button>
</div>

</form>







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
<!-- Limit Alert Modal -->
<div class="modal fade" id="limitAlertModal" tabindex="-1" aria-labelledby="limitAlertModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="limitAlertModalLabel">Selection Limit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="limitAlertMessage"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function showLimitPopup(message) {
    $('#limitAlertMessage').html(message);
    var limitModal = new bootstrap.Modal(document.getElementById('limitAlertModal'));
    limitModal.show();
}

$(document).ready(function () {
    const maxTech = 2;
    const maxNonTech = 1;
    let isReRegistration = false; // track if user already registered

    // Limit checkbox selection counts live
    $('input.club-checkbox').on('change', function () {
        const techChecked = $('input.club-checkbox[data-type="technical"]:checked').length;
        const nonTechChecked = $('input.club-checkbox[data-type="non-technical"]:checked').length;

        if (techChecked > maxTech && $(this).data('type') === 'technical') {
            alert(`You can select only ${maxTech} Technical clubs.`);
            $(this).prop('checked', false);
        }

        if (nonTechChecked > maxNonTech && $(this).data('type') === 'non-technical') {
            alert(`You can select only ${maxNonTech} Non-Technical club.`);
            $(this).prop('checked', false);
        }
    });

    // Submit form validation
    $('#clubForm').on('submit', function(e) {
        e.preventDefault();

        const techChecked = $('input.club-checkbox[data-type="technical"]:checked').length;
        const nonTechChecked = $('input.club-checkbox[data-type="non-technical"]:checked').length;

        // Only enforce minimum if NOT re-registration
        if (!isReRegistration) {
            if (techChecked < 2 || nonTechChecked < 1) {
                let message = '';
                if (techChecked < 2) {
                    message += `Please select 2 Technical clubs.<br>`;
                }
                if (nonTechChecked < 1) {
                    message += `Please select 1 Non-Technical club.`;
                }
                showLimitPopup(message);
                return false; // stop submission
            }
        }

        this.submit(); // submit if validation passed or re-registration
    });

    // Clear info and enable checkboxes on email change
    $('#email').on('change', function () {
        $('#clubLimitInfo').text('');
        $('input.club-checkbox').prop('disabled', false);
    });

    // Check existing registrations on Next button click
    $('#nextBtn').on('click', function () {
        const email = $('#email').val().trim();
        if (!email) {
            alert('Please enter your email.');
            return;
        }

        $.ajax({
            url: '{{ route("student.user.clubs") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                email: email
            },
            success: function (response) {
                if (response.status === 'found') {
                    isReRegistration = true; // user exists — re-registration mode
                    const techCount = response.tech_count;
                    const nonTechCount = response.non_tech_count;

                    $('#clubLimitInfo').text(`You have already registered in ${techCount} Technical and ${nonTechCount} Non-Technical clubs.`);

                    if (nonTechCount >= maxNonTech) {
                        $('input.club-checkbox[data-type="non-technical"]').prop('disabled', true);
                    } else {
                        $('input.club-checkbox[data-type="non-technical"]').prop('disabled', false);
                    }

                    if (techCount >= maxTech) {
                        $('input.club-checkbox[data-type="technical"]').prop('disabled', true);
                    } else {
                        const remaining = maxTech - techCount;

                        $('input.club-checkbox[data-type="technical"]').prop('disabled', false);

                        // Re-attach change event to enforce max limit dynamically
                        $('input.club-checkbox[data-type="technical"]').off('change').on('change', function () {
                            const checkedTech = $('input.club-checkbox[data-type="technical"]:checked').length;
                            if (checkedTech > remaining) {
                                alert(`Limit reached: You can select only ${remaining} Technical clubs.`);
                                $(this).prop('checked', false);
                            }
                        });
                    }
                } else {
                    isReRegistration = false; // no previous registration
                    $('#clubLimitInfo').text('');
                    $('input.club-checkbox').prop('disabled', false);
                }

                $('#personalDetailsStep').hide();
                $('#clubSelectionStep').show();
            },
            error: function() {
                alert('Error checking existing clubs. Please try again.');
            }
        });
    });

    // Reset on email input change
    $('#email').on('input', function() {
        isReRegistration = false; // reset flag
        $('#clubLimitInfo').text('');
        $('input.club-checkbox').prop('disabled', false);
        $('#clubSelectionStep').hide();
        $('#personalDetailsStep').show();
    });
});

feather.replace();
</script>
