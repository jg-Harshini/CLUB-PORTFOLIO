<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Club Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts for Professional Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        height: 100%;
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* prevent unwanted horizontal scroll */
    }

    .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        text-align: center; /* center text in general */
    }

    header {
        padding: 20px;
        text-align: center;
        background-color: rgba(27, 31, 59, 0.9);
        color: white;
    }

    .main {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url('{{ asset("img/clg1.jpg") }}') no-repeat center center;
        background-size: cover;
        background-position: 60% top;  /* shift slightly to the right */
        width: 100%;
    }

    .login-card {
        background: white;
        opacity: 0.9; /* ✅ 70% opacity */
        width: 100%;
        max-width: 420px;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    /* Square Logo */
    .login-card img.logo {
        width: 100px;
        height: 100px;
        border-radius: 12px;
        object-fit: cover;
        margin-bottom: 15px;
        display: block;
        margin-left: auto;
        margin-right: auto; /* ✅ Center the logo */
    }

    .login-card h2 {
        margin-bottom: 25px;
        font-size: 1.8rem;
        color: #1b1f3b;
        text-align: center;
    }

    form {
        text-align: center; /* ✅ center the form elements */
    }

    label {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
        color: #333;
        text-align: left; /* keep labels aligned left inside form */
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    input:focus {
        outline: none;
        border-color: #007BFF;
    }

    button {
        width: 100%;
        background-color: #007BFF;
        border: none;
        color: white;
        padding: 12px;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    footer {
        padding: 15px;
        text-align: center;
        background-color: rgba(27, 31, 59, 0.9);
        color: #ccc;
        font-size: 0.85rem;
    }

    @media (max-width: 600px) {
        .login-card {
            padding: 30px 20px;
        }
    }
</style>

</head>
<body>

    <div class="container">
        <!-- Header with Branding -->
        <header>
            <h1>TCE Club Admin Portal</h1>
        </header>

        <!-- Main Login Area -->
        <div class="main">
            <div class="login-card">
                <!-- Square Logo -->
                <img src="{{ asset('img/logo1.png') }}" alt="Logo" class="logo">

                <h2>Admin Login</h2>

                <!-- Flash Error Message -->
                @if(session('error'))
                    <div style="color: red; margin-bottom: 15px; text-align:center; font-weight:600;">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div style="color: red; margin-bottom: 15px; text-align:center;">
                        <ul style="list-style:none; padding:0; margin:0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="admin@example.com" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>

                    <button type="submit">Login</button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            &copy; 2025 TCE College. All Rights Reserved. 
        </footer>
    </div>

    <script src="{{ asset('js/admin-security.js') }}"></script>
</body>
</html>
