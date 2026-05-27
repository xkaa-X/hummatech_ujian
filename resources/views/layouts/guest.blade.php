<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tabungan Anak Emas') }}</title>

        <!-- Fonts: Outfit from Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif !important;
                background-color: #0b0a09;
                color: #f4f4f5;
                overflow-x: hidden;
            }

            /* Custom Floating Golden Orbs */
            .orb {
                position: absolute;
                border-radius: 50%;
                filter: blur(120px);
                z-index: 0;
                pointer-events: none;
                opacity: 0.45;
                transition: all 1s ease;
            }

            .orb-1 {
                top: -10%;
                left: -10%;
                width: 450px;
                height: 450px;
                background: radial-gradient(circle, rgba(212,175,55,0.3) 0%, rgba(212,175,55,0.05) 70%);
                animation: float-slow 20s infinite alternate ease-in-out;
            }

            .orb-2 {
                bottom: -15%;
                right: -10%;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(179,135,40,0.25) 0%, rgba(179,135,40,0.02) 75%);
                animation: float-reverse 25s infinite alternate ease-in-out;
            }

            .orb-3 {
                top: 40%;
                left: 60%;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(251,245,183,0.18) 0%, rgba(251,245,183,0) 60%);
                animation: float-medium 18s infinite alternate ease-in-out;
            }

            @keyframes float-slow {
                0% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(60px, -50px) scale(1.2); }
                100% { transform: translate(-30px, 40px) scale(0.9); }
            }

            @keyframes float-reverse {
                0% { transform: translate(0, 0) scale(1.1); }
                50% { transform: translate(-80px, 40px) scale(0.85); }
                100% { transform: translate(40px, -60px) scale(1.05); }
            }

            @keyframes float-medium {
                0% { transform: translate(0, 0) scale(0.95); }
                50% { transform: translate(40px, 60px) scale(1.15); }
                100% { transform: translate(-50px, -30px) scale(1); }
            }

            /* Golden metallic gradient text utilities */
            .text-gold-gradient {
                background: linear-gradient(135deg, #FFE082 0%, #D4AF37 50%, #B38728 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .text-gold-light {
                color: #FBF5B7;
            }
        </style>
    </head>
    <body class="antialiased min-h-screen relative flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 overflow-y-auto bg-[#0d0c0b]">
        <!-- Background Orbs -->
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        <div class="w-full max-w-md z-10 flex flex-col items-center">
            <!-- Brand Identity Header -->
            <div class="mb-8 text-center animate-fade-in">
                <a href="/" class="inline-block transition-transform duration-300 hover:scale-105">
                    <!-- Custom SVG Elegant Logo Slot -->
                    <x-application-logo class="w-24 h-24 mx-auto drop-shadow-[0_0_15px_rgba(212,175,55,0.3)]" />
                </a>
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-gold-gradient">
                    Tabungan Anak Emas
                </h1>
                <p class="mt-2 text-sm text-gray-400 font-medium">
                    Masa Depan Berkilau Mulai Hari Ini
                </p>
            </div>

            <!-- Glassmorphic Card Container -->
            <div class="w-full backdrop-blur-md bg-white/5 dark:bg-black/40 border border-white/10 dark:border-amber-500/20 shadow-[0_8px_32px_0_rgba(0,0,0,0.5)] rounded-2xl overflow-hidden transition-all duration-500 hover:border-amber-500/40 p-8">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
