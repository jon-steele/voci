<x-app-layout>
    <div class="h-screen flex flex-col justify-center items-center content-center">
        <p>Out of cards.</p>

        <form class="m-8" action="{{ route('study.initialize', $deck) }}" method="get">
            <input type="hidden" name="mode" value="{{ (session('voice') == "true") ? "on" : "" }}">
            <x-primary-button>Reshuffle</x-primary-button>
        </form>
        <a href="{{ route('decks.index') }}"><x-primary-button>Decks</x-primary-button></a>
    </div>
</x-app-layout>