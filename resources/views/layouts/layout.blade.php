{{-- This is Not Use. Because x-components used --}}

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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app" class="container mx-auto">
            <section class="py-4">
                <header>
                    <h1>
                        <img src="/images/logo.svg" alt="">
                    </h1>
                </header>
            </section>
            <section>
                <div class="font-sans text-gray-900 antialiased">
                    <div class="lg:flex lg:justify-between">
                        <div class="lg:w-32">
                            @include('_sidebar-links')
                        </div>
                        <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
                            @yield('content')
                        </div>
                        <div class="lg: w-1/6 bg-blue-100 rounded-lg p-4">
                            @auth
                            @include('_friends-list')
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
