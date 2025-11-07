<header>
    <div class="navbar">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo">
            <span>CAPITAL TAXPLUS</span>
        </a>

        <!-- Navigation -->
        <nav>
            <ul id="menu">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('user.about') }}" class="{{ request()->is('about*') ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ route('user.service') }}" class="{{ request()->is('service*') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ route('user.pricing') }}" class="{{ request()->is('pricing*') ? 'active' : '' }}">Pricing</a></li>
                <li><a href="{{ route('user.contact') }}" class="{{ request()->is('contact*') ? 'active' : '' }}">Contact Us</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            @guest
            <a href="{{ url('/login') }}" class="btn-new login-btn">Login</a>
            <a href="{{ url('/register') }}" class="btn-new register-btn">Register</a>
            @else
            <div class="user-menu">
                <button type="button" class="user-info" id="userToggle">
                    <img src="{{ asset('images/user-icon.svg') }}" alt="User Icon" class="user-icon">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </button>

                <div class="dropdown-content" id="dropdownMenu">
                    <form action="{{ url('/logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
            @endguest
        </div>


        <!-- Mobile Menu Button -->
        <div class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
<!-- Dropdown Toggle Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("userToggle");
        const dropdownMenu = document.getElementById("dropdownMenu");

        if (toggleBtn) {
            toggleBtn.addEventListener("click", function (e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle("show");
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener("click", function (e) {
            if (dropdownMenu && !dropdownMenu.contains(e.target) && !toggleBtn.contains(e.target)) {
                dropdownMenu.classList.remove("show");
            }
        });
    });
</script>