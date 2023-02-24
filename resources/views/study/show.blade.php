<x-app-layout>
    <div class="h-screen flex flex-col justify-center items-center content-center">

        {{-- Card Div --}}
        <div class="rounded-md mb-8 p-4 rounded-md flex flex-col justify-center w-full md:w-10/12 xl:w-2/3 shadow-lg">

            @if (session('side') == 0)
                <p id="read" class="m-8 break-word font-qs text-3xl">{{ $cards[$index]->front; }}</p>
            
            @else
                <p id="read" class="m-8 break-word font-qs text-3xl">{{ $cards[$index]->back; }}</p>
                {{ session(['index' => session('index') - 1]); }}
            @endif

        </div>

        {{-- Flip Button --}}
        <a href="{{ route('study.show', $deck) }}"><x-primary-button>Next</x-primary-button></a>

        @if (session('voice') == "true")
            {{-- Passing voice rate from php into JS --}}

            <div id="rate" style="display: none">{{ session('rate'); }}</div>
            <div id="voice" style="display: none">{{ session('voice'); }}</div>
            {{-- Text To Speech Script --}}
            <script src="{{ asset('js/text_to_speech.js') }}"></script>
            {{-- Speech Recognition Script --}}
            <script type="text/javascript" src="{{ asset('js/speech_controller.js') }}"></script>
        @endif
    </div>
</x-app-layout>