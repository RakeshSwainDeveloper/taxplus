<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/user/register.css'])
</head>

<body>
    <a href="{{ url('/') }}" class="back-button"><i class="fa fa-arrow-left"></i></a>
    <div class="container">
        <div class="left-panel">
            <div class="logo-box">
                <h1>COMPANY LOGO</h1>
                <p>Your tagline goes here</p>
            </div>
        </div>

        <div class="right-panel">
            <h2>REGISTER</h2>
            <p style="color:#00e5ff;">It's completely free</p>

            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit" class="btn">Create Account</button>
            </form>

            <p class="text-muted">Already have an account? <a href="{{ url('/login') }}" style="color:#00e5ff;">Login</a></p>
        </div>
    </div>

</body>