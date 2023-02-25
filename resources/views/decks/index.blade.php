<script defer type="text/javascript" src="{{ asset('js/stop_speech.js') }}"></script>
<x-app-layout>
    <div class="mt-8 mx-0 flex flex-col items-center w-screen md:w-10/12 xl:w-2/3">

        {{-- Title & New Deck Div --}}
        <div class="flex justify-between w-full items-center">
            <h1 class="text-primary font-qs font-semibold text-3xl bg-transparent">{{ Auth::user()->name }}'s Decks </h1>
            <a class="m-4 mt-4 mb-4 rounded-md" href="{{ route('decks.create') }}"><x-new-button>New Deck</x-new-button></a>
        </div>

        {{-- Decks Div --}}
        <div class="rounded-md flex flex-col justify-center my-4 py-4 px-2 md:px-4 w-full">

            @forelse ($decks as $deck)

            {{-- Decks Styling --}}
            <div class="flex flex-col rounded-md mx-2 my-4 md:m-4 p-4 md:p-4 shadow-lg shadow-gray-300 outline-white outline-1 outline">

                <div class="w-full"><h1 class="text-primary text-center font-qs font-semibold bg-transparent mx-4 text-2xl">{{ $deck->name }}</h1></div>

                <div class="flex">
                    <a class="m-2 md:m-4 w-2/3 md:w-1/2" href="{{ route('study.prime', $deck) }}">
                        <x-primary-button class="w-full break-word">Study</x-primary-button>
                    </a>
                    <a class="m-2 md:m-4 w-1/3 md:w-1/2" href="{{ route('decks.show', $deck) }}">
                        <x-primary-button class="w-full break-word">Edit</x-primary-button>
                    </a>
                </div>
            </div>

            @empty
                <p class="m-4">You have no decks.</p>               
            @endforelse
            {{  $decks->links() }}
        </div>
    </div>
</x-app-layout>
