<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login / Register - AI Resume Analyzer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background-color: #0f111a;
            color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: radial-gradient(circle at top left, #1c1c2c, #0f111a);
        }

        .auth-box {
            background-color: #1a1d2d;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #00ffaa;
            margin-bottom: 30px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .tab {
            cursor: pointer;
            padding: 10px 20px;
            margin: 0 10px;
            border-bottom: 2px solid transparent;
            color: #ccc;
            transition: 0.3s;
        }

        .tab.active {
            color: #00ffaa;
            border-color: #00ffaa;
        }

        form {
            display: none;
        }

        form.active {
            display: block;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #333;
            background-color: #2e3046;
            color: #eee;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00ffaa;
            color: #000;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00ddaa;
        }

        .extra-link {
            margin-top: 12px;
            text-align: center;
            font-size: 13px;
        }

        .extra-link a {
            color: #00ffaa;
            text-decoration: none;
        }

        .extra-link a:hover {
            text-decoration: underline;
        }

        .social-login {
            text-align: center;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }

        .social-icons img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #fff;
            padding: 8px;
            transition: transform 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        .social-icons img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="auth-box">
        <div style="text-align: center; margin-bottom: 30px;">
            <a href="">
                <img src="{{ asset('images/logo2.png') }}" alt="ResuMate Logo" style="height: 60px;">
            </a>
        </div>


        <div class="tabs">
            <div class="tab active" onclick="switchTab('login')">Login</div>
            <div class="tab" onclick="switchTab('register')">Register</div>
        </div>
        @if (session('success'))
            <p style="color:#00ffaa;text-align:center;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul style="color: red; padding-left: 15px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" id="login" class="active">
            @csrf
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
            <div class="extra-link">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
        @if (session('success'))
            <p style="color:#00ffaa;text-align:center;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul style="color: red; padding-left: 15px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" id="register">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
            <button type="submit">Register</button>
        </form>

        <!-- Social Login Section -->
        <div class="social-login">
            <p style="text-align:center; margin: 25px 0 15px; color:#888;">Or continue with</p>
            <div class="social-icons">
                <a href="" title="Login with Google">
                    <img src="images/OIP.jpg" alt="Google Logo" width="40" height="40">
                </a>
                <a href="" title="Login with GitHub">
                    <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png"
                        alt="GitHub" />
                </a>
            </div>
        </div>
    </div>

    <script>
        function switchTab(id) {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('form').forEach(f => f.classList.remove('active'));

            document.querySelector('.tab[onclick*="' + id + '"]').classList.add('active');
            document.getElementById(id).classList.add('active');
        }
    </script>
</body>

</html>
