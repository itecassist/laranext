<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="container min-h-screen max-w-7xl mx-auto">
        <header class="bg-cyan-800 h-[70px] ">
            <div class="flex justify-between items-center">
                <div class="">
                    <img src="/Logo.png" alt="Tailwind Kit" class="h-10 ml-8 mt-2">
                </div>
                <div class="mt-5">
                    <x-nav-link href="{{ route('home') }}" class="mr-5" :active="request()->routeIs('home')">
                        {{ __('lookup.guest_menu.home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard') }}" class="mr-5" :active="request()->routeIs('dashboard')">
                        {{ __('lookup.guest_menu.about') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('organisations') }}" class="mr-5" :active="request()->routeIs('organisations')">
                        {{ __('lookup.guest_menu.organisations') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('lookup.guest_menu.help') }}
                    </x-nav-link>
                </div>
                <div class="mt-5 items-center">

                    <div class="text-end mr-5">
                        @auth
                        <x-nav-link href="{{ route('dashboard') }}" class="mr-5" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        @else
                        <x-nav-link href="{{ route('login') }}" class="mr-5" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                        @endauth
                    </div>

                </div>

            </div>
        </header>
        <main class="bg-gray-100 min-h-screen">
            {{ $slot }}
        </main>

    </div>

    @livewireScripts
</body>

</html>