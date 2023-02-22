<x-app-layout>
    <p>Out of cards.</p>

    <form action="{{ route('study.initialize', $deck) }}" method="get">
        <input type="hidden" name="mode" value="{{ (session('voice') == "true") ? "on" : "" }}">
        <x-primary-button>Reshuffle</x-primary-button>
    </form>
    <a href="{{ route('decks.index') }}"><x-primary-button>Decks</x-primary-button></a>
</x-app-layout>