<x-app-layout>
    <div class="h-screen flex flex-col justify-center items-center content-center">
        @if (session('side') == 0)
            <p class="m-8 break-all">{{ $cards[$index]->front; }}</p>
            <a href="{{ route('study.show', $deck) }}"><x-primary-button>flip</x-primary-button></a>

            <div id="read" style="display: none">{{ $cards[$index]->front; }}</div>

        @else
            <p class="m-8 break-all">{{ $cards[$index]->back; }}</p>
            <a href="{{ route('study.show', $deck) }}"><x-primary-button>next</x-primary-button></a>

            <div id="read" style="display: none">{{ $cards[$index]->back; }}</div>
            
            {{ session(['index' => session('index') - 1]); }}
        @endif

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