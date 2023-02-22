<x-app-layout>
    <p>Out of cards.</p>

    <a href="{{ route('study.initialize', $deck) }}"><x-primary-button>Reshuffle</x-primary-button></a>
    <a href="{{ route('decks.index') }}"><x-primary-button>Decks</x-primary-button></a>
</x-app-layout>