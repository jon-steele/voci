<x-app-layout>

    <div class="w-full flex content-center justify-center m-8">
        <div class="flex flex-col">

            <form class="flex flex-col justify-center items-center" method="get" action="{{ route('study.initialize', $deck) }}">
                <div class="flex justify-center items-center">
                    <p>Classic</p>
                    <div class="flex items-center justify-center w-full m-8">
                        <label for="toogleA" class="flex items-center cursor-pointer">
                            <div class="relative">
                                <input id="toogleA" name="mode" type="checkbox" class="sr-only" />
                                <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                            </div>
                        </label>
                    </div>
                    <p>Voice</p>
                </div>
                <x-primary-button class="bg-green-500">Begin</x-primary-button>
            </form>
        </div>
    </div>

</x-app-layout>