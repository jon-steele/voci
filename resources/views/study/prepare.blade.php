<x-app-layout>

    <div class="w-full flex content-center justify-center m-8">
        <div class="flex flex-col">
            <div class="text-center flex m-4">
                <h1>Style:</h1>
                <button>Classic</button>
                <button>voci</button>
            </div>
            <div class="m-4">
                <x-primary-button>Settings</x-primary-button>
                <a href="{{ route('study.initialize', $deck) }}"><x-primary-button class="bg-green-500">Begin</x-primary-button></a>
            </div>
        </div>
    </div>

</x-app-layout>