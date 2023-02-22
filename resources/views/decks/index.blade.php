<x-app-layout>
    <div class="flex justify-center w-full">
        <h1 class="text-primary bg-transparent text-2xl">{{ Auth::user()->name }}'s Decks </h1>
        <a class="m-4 mt-4 mb-4 rounded-md" href="{{ route('decks.create') }}"><x-new-button>New Deck</x-new-button></a>
    </div>

    <div class="m-4 border-primary border-4 rounded-md flex flex-col justify-center w-min-content">

        @forelse ($decks as $deck)

        <div class="flex">
            <a class="m-4" href="{{ route('study.prime', $deck) }}">
                <x-primary-button class="w-full">Study</x-primary-button>
            </a>

            <a class="m-4" href="{{ route('decks.show', $deck) }}">
                <x-primary-button class="w-full">{{ $deck->name }}</x-primary-button>
            </a>
        </div>

        @empty
            <p class="m-4">You have no decks.</p>               
        @endforelse
        {{  $decks->links() }}
    </div>
</x-app-layout>
