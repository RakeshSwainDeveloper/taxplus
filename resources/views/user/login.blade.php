<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/user/login.css'])
</head>

<body>
    <a href="{{ url('/') }}" class="back-button"><i class="fa fa-arrow-left"></i></a>
    <div class="login-container">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
            </svg>
        </div>
        <h2>CUSTOMER LOGIN</h2>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email ID" required>
            <input type="password" name="password" placeholder="Password" required>

            <div class="login-options">
                <!-- <label class="remember-me">
                    <input type="checkbox" name="remember"> <span>Remember me</span>
                </label> -->
                <a href="#">Forgot Password?</a>
            </div>

            <!-- Display backend errors above the login button -->
            @if ($errors->any())
                <div class="error-messages">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <button type="submit" class="login-btn">LOGIN</button>
        </form>

    </div>
</body>
</html>
