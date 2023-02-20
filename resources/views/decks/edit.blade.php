<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Deck') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('decks.update', $deck) }}" method="post">

                {{-- We need to use a put method, but html forms only support post and get --}}
                @method('put')
                {{-- This is the purpose of the @method('put') --}}

                @csrf
                <x-text-input type="text" name="name" field="name" placeholder="Name"></x-text-input>
                <x-primary-button type="submit">Update</x-primary-button>
                
                @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror

            </form>
        </div>
    </div>
</x-app-layout>
