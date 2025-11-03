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

        <!-- Auth Buttons -->
        <div class="auth-buttons">
            <a href="{{ url('/login') }}" class="btn login-btn">Login</a>
            <a href="{{ url('/register') }}" class="btn register-btn">Register</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
