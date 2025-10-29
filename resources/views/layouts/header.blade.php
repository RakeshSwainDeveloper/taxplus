<header>
    <div class="navbar">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <span>TAX+</span>
        </a>

        <!-- Navigation -->
        <nav>
            <ul id="menu">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ url('/products') }}" class="{{ request()->is('products') ? 'active' : '' }}">Products</a></li>
                <li><a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ url('/projects') }}" class="{{ request()->is('projects') ? 'active' : '' }}">Projects</a></li>
                <li><a href="{{ url('/blog') }}" class="{{ request()->is('blog') ? 'active' : '' }}">Blog</a></li>
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
