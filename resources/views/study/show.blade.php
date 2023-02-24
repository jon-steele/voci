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
            
            {{-- Text To Speech Script --}}
            <script>

                // Acquiring parameters from php
                let read = document.getElementById("read").textContent;
                let rate = document.getElementById("rate").textContent;

                // Setting up the utterance
                let utterance = new SpeechSynthesisUtterance(read);
                utterance.voice = window.speechSynthesis.getVoices()[4];
                utterance.rate = rate;

                // Activating the utterance
                speechSynthesis.speak(utterance);
            </script>
        @endif
    </div>

    <script type="text/javascript" src="{{ asset('js/speech_recognition_show.js') }}"></script>
</x-app-layout>