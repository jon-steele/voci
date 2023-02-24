<script defer type="text/javascript" src="{{ asset('js/stop_speech.js') }}"></script>
<x-app-layout>

        {{-- Name, Edit and Delete Buttons --}}
        <div class="px-4 w-full md:w-10/12 xl:w-2/3 flex justify-between items-center my-8">

            <h2 class="text-primary font-qs font-semibold text-3xl bg-transparent">{{ $deck->name }}</h2>

            <div class="flex h-full my-auto items-center">
                <a href="{{ route('decks.edit', $deck) }}"><x-primary-button>Edit Name</x-primary-button></a>
                
                <form action="{{ route('decks.destroy', $deck) }}" method="post" class="m-0 ml-4 flex items-center">
                    @method('delete')
                    @csrf
                    <x-red-button type="submit" onclick="return confirm('Are you sure you want to delete this deck?')">Delete</x-red-button>
                </form>
            </div>
        </div>

        {{-- Cards Div --}}
        <div class="mb-8 p-4 rounded-md flex flex-col justify-center w-full md:w-10/12 xl:w-2/3">

            @forelse ($cards as $card)

                {{-- Individual Card Div --}}
                <div class="m-4 p-8 shadow-lg shadow-gray-300 outline-white outline-1 outline rounded-md">
                    <p class="font-qs font-medium text-xl text-center break-all">{{ $card->front }}</p>
                    <p class="text-center">- - -</p>
                    <p class="font-qs font-medium text-xl text-center break-all">{{ $card->back }}</p>
                    <form action="{{ route('decks.cards.destroy', ['deck' => $deck->uuid, 'card' => $card->uuid]) }}" method="post" class="ml-3 flex justify-center">
                        @method('delete')
                        @csrf
                        <x-red-button type="submit" onclick="return confirm('Are you sure you want to delete this card?')" class="mt-4">Delete</x-red-button>
                    </form>
                </div>

            @empty
                <p class="m-4">You have no cards.</p>               
            
                @endforelse
            
            {{  $cards->links() }}
        </div>

        {{-- Add Card Div --}}
        <div class="my-6 p-4 bg-secondary px-4 w-full md:w-10/12 xl:w-2/3">
            <form action="{{ route('decks.cards.store', $deck->uuid) }}" method="post" class="flex flex-col justify-center">
                @csrf
                <input type="hidden" name="deck_id" value="{{ $deck->deck_id }}">
                <textarea tabindex="1" rows="6" class="rounded-md m-2 p-4 text-gray-700 border-none text-center text-xl" field='front' name="front" placeholder="Front"></textarea>
                    @error('front')
                        <div class="text-red-600 text-center">{{ $message }}</div>
                    @enderror
                <textarea tabindex="2" rows="6" class="rounded-md m-2 p-4 text-gray-700 border-none text-center text-xl" field="back" name="back" placeholder="Back"></textarea>
                    @error('back')
                        <div class="text-red-600 text-center">{{ $message }}</div>
                    @enderror   
                <x-new-button tabindex="3" type="submit" class="m-4 self-center px-32 text-xl">Add</x-new-button>

            </form>
        </div>
</x-app-layout>