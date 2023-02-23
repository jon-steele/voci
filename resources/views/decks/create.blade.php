<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Deck') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-center">

            <form action="{{ route('decks.store') }}" method="post">
                @csrf
                <x-text-input type="text" name="name" field="name" placeholder="Name"></x-text-input>
                <x-new-button type="submit" value="Create">Add</x-new-button>
                @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </form>

            <a class="text-center m-8" href="{{ route('decks.index') }}"><x-primary-button type="submit" value="Create">Back</x-primary-button></a>

        </div>
    </div>
</x-app-layout>
