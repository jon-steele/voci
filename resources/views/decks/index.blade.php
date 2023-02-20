<x-app-layout>
    <div class="m-4 border-primary border-4 rounded-md flex flex-col justify-center w-min-content">
        
        <a class="m-4 mt-4 mb-4" href="{{ route('decks.create') }}"><x-primary-button>+ New Deck +</x-primary-button></a>

        @forelse ($decks as $deck)

        <a class="m-4" href="{{ route('decks.show', $deck) }}">
            <x-primary-button class="w-full">{{ $deck->name }}</x-primary-button>
        </a>
        @empty
            <p class="m-4">You have no decks.</p>               
        @endforelse
        {{  $decks->links() }}
    </div>
</x-app-layout>
