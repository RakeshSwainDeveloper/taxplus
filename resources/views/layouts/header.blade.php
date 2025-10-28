<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    {{-- Vite handles CSS & JS --}}
    @vite(['resources/css/header.css', 'resources/js/header.js'])
</head>
<body>

<header>
    <div class="navbar">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <span>TAX+</span>
        </a>

        <!-- Mobile Menu Button -->
        <div class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Navigation -->
        <nav>
            <ul id="menu">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ url('/products') }}" class="{{ request()->is('products') ? 'active' : '' }}">Our Products</a></li>
                <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
