<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>voci</title>
        <script defer type="text/javascript" src="{{ asset('js/stop_speech.js') }}"></script>
        @vite('resources/css/app.css')
    </head>

    <main class="w-screen h-screen flex flex-col gap-10 bg-secondary">

        <div class="w-screen bg-secondary text-primary text-center m-auto">
            
            <h1 class="text-5xl font-bold">voci.</h1>
            <p class="font-qs font-thin mt-4 mb-8">(Voice Operated flashCard Interface)</p>
            
            @if (Route::has('login'))
            @auth
                <a href="{{ route('decks.index') }}"><x-primary-button>Decks</x-primary-button></a>
            @else
                <a href="{{ route('login') }}" ><x-primary-button>Log in</x-primary-button></a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><x-primary-button>Register</x-primary-button></a>
                @endif
            @endauth
        @endif

        </div>
    </main>
</html>
