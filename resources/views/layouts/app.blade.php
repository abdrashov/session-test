<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div wire:offline class="absolute top-0 w-full">
            <div class="bg-red-100 text-red-900 rounded-lg shadow-md p-4 m-4">
              Ой! Произошло что-то ужасное. Проверьте ваше интернет-соединение!
            </div>
        </div>

        <div class="min-h-screen bg-gray-100">
            @auth
              @livewire('navigation-menu')
            @else
                <nav class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('lesson.index') }}">
                                    <x-jet-application-mark class="block h-9 w-auto" />
                                </a>
                            </div>

                            <div class="flex">

                                <!-- Navigation Links -->
                                <div class="-my-px ml-10 flex">
                                    <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                        {{ __('Login') }}
                                    </x-jet-nav-link>
                                </div>

                                <div class="-my-px ml-10 flex">
                                    <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                        {{ __('Register') }}
                                    </x-jet-nav-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            @endauth

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
