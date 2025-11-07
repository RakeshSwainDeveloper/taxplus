<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/user/register.css'])
    <style>
        .error-message {
            color: #ff5252;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none;
        }

        input.invalid {
            border: 1px solid #ff5252;
            box-shadow: 0px 0px 4px #ff5252;
        }

        /* Password input with toggle button */
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper input {
            width: 100%;
            padding-right: 40px;
            /* make space for icon */
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            /* color: #aaa; */
            color: #444;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: #00e5ff;
        }
    </style>
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

            <form id="registerForm" method="POST" action="{{ url('/register') }}">
                @csrf

                <!-- Name -->
                <input type="text" name="name" id="name" placeholder="Full Name" required>
                <span class="error-message" id="nameError">Please enter your full name.</span>

                <!-- Email -->
                <input type="email" name="email" id="email" placeholder="Email Address" required>
                <span class="error-message" id="emailError">Please enter a valid email address.</span>

                <!-- Password -->
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fa fa-eye toggle-password" id="togglePassword"></i>
                </div>
                <span class="error-message" id="passwordError">
                    Password must start with a capital letter, contain at least one number and one special character.
                </span>

                <!-- Confirm Password -->
                <div class="password-wrapper">
                    <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password" required>
                    <i class="fa fa-eye toggle-password" id="toggleConfirmPassword"></i>
                </div>
                <span class="error-message" id="confirmPasswordError">Passwords do not match.</span>

                {{-- 🔴 BACKEND ERROR MESSAGES (GLOBAL) --}}
                @if ($errors->any())
                <div class="error-message" style="display:block; margin-top:10px; text-align:center;">
                    {{ $errors->first() }}
                </div>
                @endif

                {{-- 🔵 SUCCESS MESSAGE (IF ANY) --}}
                @if (session('success'))
                <div style="color:#00e5ff; margin-top:10px; text-align:center;">
                    {{ session('success') }}
                </div>
                @endif

                <button type="submit" class="btn">Create Account</button>
            </form>

            <p class="text-muted">Already have an account?
                <a href="{{ url('/login') }}" style="color:#00e5ff;">Login</a>
            </p>
        </div>
    </div>

    <script>
        const form = document.getElementById('registerForm');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        // Validation functions
        function validateEmail() {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const valid = regex.test(email.value);
            email.classList.toggle('invalid', !valid);
            emailError.style.display = valid ? 'none' : 'block';
            return valid;
        }

        function validatePassword() {
            // Must start with capital, contain at least one number and one special char
            const regex = /^(?=[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{6,}$/;
            const valid = regex.test(password.value);
            password.classList.toggle('invalid', !valid);
            passwordError.style.display = valid ? 'none' : 'block';
            return valid;
        }

        function validateConfirmPassword() {
            const valid = password.value === confirmPassword.value && confirmPassword.value !== "";
            confirmPassword.classList.toggle('invalid', !valid);
            confirmPasswordError.style.display = valid ? 'none' : 'block';
            return valid;
        }

        // Real-time validation
        email.addEventListener('input', validateEmail);
        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validateConfirmPassword);

        form.addEventListener('submit', function(e) {
            const validEmail = validateEmail();
            const validPassword = validatePassword();
            const validConfirm = validateConfirmPassword();
            if (!validEmail || !validPassword || !validConfirm) {
                e.preventDefault();
            }
        });

        // Show / Hide Password
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', () => {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            toggleConfirmPassword.classList.toggle('fa-eye');
            toggleConfirmPassword.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>