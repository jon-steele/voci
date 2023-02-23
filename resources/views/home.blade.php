<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>voci</title>
        @vite('resources/css/app.css')
    </head>
    <body class="h-screen">

        <main class="w-screen">
            <h1 class="text-5xl w-screen">voci.</h1>
            <br>
            <p>(Voice Operated flashCard Interface)</p>
            <br>
        </main>

        <div class="m-auto h-16 flex justify-center content-center">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ route('decks.index') }}"><x-primary-button>Decks</x-primary-button></a>
                    @else
                        <a href="{{ route('login') }}" ><x-primary-button>Log in</x-primary-button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><x-primary-button>Register</x-primary-button></a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
