<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Club Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts for Professional Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* ===== Reset & Base Styling ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        /* ===== Layout Container ===== */
        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            padding: 20px;
            text-align: center;
            background-color: #1b1f3b;
            color: white;
        }

        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #ffffff, #e8ecf3);
        }

        /* ===== Login Card Styling ===== */
        .login-card {
            background: white;
            width: 100%;
            max-width: 420px;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .login-card img.logo {
            width: 80px;
            margin-bottom: 15px;
        }

        .login-card h2 {
            margin-bottom: 25px;
            font-size: 1.8rem;
            color: #1b1f3b;
        }

        /* ===== Form Inputs ===== */
        form {
            text-align: left;
        }

        label {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
            color: #333;
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

        /* ===== Login Button ===== */
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

        .links {
            margin-top: 15px;
            text-align: center;
            font-size: 0.9rem;
        }

        .links a:hover {
            text-decoration: underline;
        }

        footer {
            padding: 15px;
            text-align: center;
            background-color: #1b1f3b;
            color: #ccc;
            font-size: 0.85rem;
        }

        /* ===== Responsive Media Query ===== */
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
            <h1>Club Admin Portal</h1>
        </header>

        <!-- Main Login Area -->
        <div class="main">
            <div class="login-card">
                <h2>Admin Login</h2>

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

        <!-- Footer with Links -->
        <footer>
            &copy; 2025 TCE College. All Rights Reserved. 
        </footer>
    </div>

</body>
</html>
