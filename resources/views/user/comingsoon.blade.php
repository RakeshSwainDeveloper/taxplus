@extends('layouts.app')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    html {
        background-color: #000000 !important;
        /* solid black */
        margin: 0;
        padding: 0;
    }


    .coming {
        height: 100vh;
        width: 100%;
        background: radial-gradient(circle at top, #0a0a0a, #000);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        color: #fff;
    }

    /* --- Floating particles --- */
    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: #00eaff;
        border-radius: 50%;
        opacity: 0.6;
        animation: floatParticle linear infinite;
    }

    @keyframes floatParticle {
        0% {
            transform: translateY(0) translateX(0);
            opacity: 1;
        }

        100% {
            transform: translateY(-800px) translateX(200px);
            opacity: 0;
        }
    }

    /* --- Main Container --- */
    .container {
        position: relative;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 60px 50px;
        border-radius: 20px;
        text-align: center;
        width: 90%;
        max-width: 480px;
        box-shadow: 0 0 30px rgba(0, 234, 255, 0.15);
        animation: float 6s ease-in-out infinite alternate;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(-10px);
        }
    }

    /* --- Glowing Circle Behind --- */
    .glow-circle {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0, 234, 255, 0.3), transparent 70%);
        transform: translate(-50%, -50%);
        z-index: -1;
        filter: blur(30px);
        animation: pulseGlow 4s ease-in-out infinite;
    }

    @keyframes pulseGlow {

        0%,
        100% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.6;
        }

        50% {
            transform: translate(-50%, -50%) scale(1.1);
            opacity: 0.9;
        }
    }

    /* --- Title --- */
    h1 {
        font-size: 2.8rem;
        color: #00eaff;
        text-transform: uppercase;
        text-shadow: 0 0 20px #00eaff, 0 0 60px #0077ff;
        margin-bottom: 10px;
        animation: glowTitle 3s ease-in-out infinite alternate;
    }

    @keyframes glowTitle {
        from {
            text-shadow: 0 0 15px #0099ff;
        }

        to {
            text-shadow: 0 0 40px #00eaff;
        }
    }

    /* --- Subtitle --- */
    h2 {
        font-size: 1.2rem;
        font-weight: 400;
        color: #aaa;
        margin-bottom: 30px;
    }

    /* --- Animation core --- */
    .core {
        position: relative;
        margin: 0 auto 30px;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: radial-gradient(circle at center, #00eaff 0%, #002244 80%);
        box-shadow: 0 0 40px rgba(0, 234, 255, 0.8), 0 0 80px rgba(0, 234, 255, 0.4);
        animation: pulseCore 2s ease-in-out infinite;
    }

    @keyframes pulseCore {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.9;
        }
    }

    .ring {
        position: absolute;
        top: 50%;
        left: 50%;
        border: 2px solid rgba(0, 234, 255, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: rotateRing 10s linear infinite;
    }

    .ring:nth-child(1) {
        width: 160px;
        height: 160px;
    }

    .ring:nth-child(2) {
        width: 200px;
        height: 200px;
        animation-direction: reverse;
        border-color: rgba(0, 234, 255, 0.15);
    }

    @keyframes rotateRing {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    /* --- Button --- */
    .btn-home {
        display: inline-block;
        border: none;
        border-radius: 25px;
        padding: 0.7rem 1.5rem;
        background: linear-gradient(90deg, #00e0ff, #ff8ae2);
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: transform 0.2s ease;
    }

    .btn-home:hover {
        background: #0099ff;
        color: #fff;
        transform: translateY(-5px);
        box-shadow: 0 0 40px rgba(0, 234, 255, 0.8);
    }

    button {
        background: #00eaff;
        border: none;
        color: #000;
        padding: 14px 32px;
        border-radius: 8px;
        font-size: 1.1em;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 0 25px rgba(0, 234, 255, 0.6);
        transition: all 0.3s ease;
    }

    footer {
        margin-top: 40px;
        font-size: 0.85rem;
        color: #666;
    }
</style>
@endpush

@section('content')
<div class="coming" style="min-height: calc(100vh - 100px); display:flex; justify-content:center; align-items:center;">
    <div class="glow-circle"></div>

    <div class="container">
        <div class="core">
            <div class="ring"></div>
            <div class="ring"></div>
        </div>

        <h1>Under Maintenance</h1>
        <h2>We’re currently improving our system to serve you better.</h2>
        <a href="{{ url('/') }}" class="btn-home">Return to Home</a>

        <!-- <button onclick="alert('Redirecting...')">Return to Home</button> -->

        <!-- <footer>© {{ date('Y') }} Capital Tax Plus. All rights reserved.</footer> -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Floating particles for depth and motion
    const createParticle = () => {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * window.innerWidth + 'px';
        particle.style.top = window.innerHeight + 'px';
        particle.style.animationDuration = 5 + Math.random() * 10 + 's';
        document.body.appendChild(particle);
        setTimeout(() => particle.remove(), 12000);
    };
    setInterval(createParticle, 300);
</script>
@endpush