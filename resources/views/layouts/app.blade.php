<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>voci</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="h-16 m-0 antialiased">
            {{-- Nav Bar --}}
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="h-max">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
