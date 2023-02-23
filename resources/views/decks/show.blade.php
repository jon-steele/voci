<x-app-layout>
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center">
                {{-- Edit Deck --}}
                <a href="{{ route('decks.edit', $deck) }}"><x-primary-button>Edit Name</x-primary-button></a>
                
                {{-- Delete Deck --}}
                <form action="{{ route('decks.destroy', $deck) }}" method="post" class="ml-3">
                    @method('delete')
                    @csrf
                    <x-primary-button type="submit" class="bg-red-500" onclick="return confirm('Are you sure you want to delete this deck?')">Delete</x-primary-button>
                </form>
            </div>

            <div class="m-4 text-center">
                <h2 class="font-bold text-2xl">{{ $deck->name }}</h2>
            </div>

            <div class="m-4 border-primary border-4 rounded-md flex flex-col justify-center">

                @forelse ($cards as $card)
                    <div class="m-4">
                        <p class="text-center">{{ $card->front }}</p>
                        <p class="text-center">{{ $card->back }}</p>
                        <form action="{{ route('decks.cards.destroy', ['deck' => $deck->uuid, 'card' => $card->uuid]) }}" method="post" class="ml-3 flex justify-center">
                            @method('delete')
                            @csrf
                            <x-red-button type="submit" class="mt-4">Delete</x-red-button>
                        </form>
                    </div>

                @empty
                    <p class="m-4">You have no cards.</p>               
                
                    @endforelse
                
                {{  $cards->links() }}
            </div>

            <div class="my-6 p-4 bg-secondary border-primary border-4 rounded-lg">
                <form action="{{ route('decks.cards.store', $deck->uuid) }}" method="post" class="flex flex-col justify-center">
                    @csrf
                    <input type="hidden" name="deck_id" value="{{ $deck->deck_id }}">
                    <textarea rows="6" class="rounded-md m-2 p-4 text-gray-700 border-none text-center" field='front' name="front" placeholder="Front"></textarea>
                        @error('front')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    <textarea rows="6" class="rounded-md m-2 p-4 text-gray-700 border-none text-center" field="back" name="back" placeholder="Back"></textarea>
                        @error('back')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror   
                    <x-new-button type="submit" class="m-4">Add</x-new-button>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>