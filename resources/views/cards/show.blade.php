<div class="m-4 border-primary border-4 rounded-md flex flex-col justify-center w-min-content">

    @forelse ($cards as $card)
        <p class="w-full">{{ $card->front }}</p>
        <p class="w-full">{{ $card->back }}</p>

    @empty
        <p class="m-4">You have no decks.</p>       

    @endforelse
    {{  $cards->links() }}

    <div class="my-6 p-6 bg-secondary border-primary border-4 sm:rounded-lg">
        <form action="{{ route('cards.store') }}" method="post" class="flex flex-col justify-center">
            @csrf
            <x-text-input placeholder="Front" class="m-4 bg-white h-16"></x-text-input>
            <x-text-input placeholder="Back" class="m-4 bg-white h-16"></x-text-input>
            <x-primary-button type="submit" class="m-4">Add</x-primary-button>
        </form>
    </div>
</div>