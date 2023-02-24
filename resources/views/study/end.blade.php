<x-app-layout>
    <div id="deck_uuid" style="display: none">{{ $deck->uuid; }}</div>
    <div class="h-screen flex flex-col justify-center items-center content-center">
        <p>Out of cards.</p>

        <form class="m-8" action="{{ route('study.initialize', $deck) }}" method="get">
            <input type="hidden" name="mode" value="{{ (session('voice') == "true") ? "on" : "" }}">
            <x-primary-button>Reshuffle</x-primary-button>
        </form>
        <a href="{{ route('decks.index') }}"><x-primary-button>Decks</x-primary-button></a>
    </div>

    @if (session('voice') == "true")

        {{-- Passing voice rate from php into JS --}}
        <div id="rate" style="display: none">{{ session('rate'); }}</div>

        <script>
            // Acquiring parameters from php
            let read = "Out of cards";
            let rate = document.getElementById("rate").textContent;

            // Setting up the utterance
            let utterance = new SpeechSynthesisUtterance(read);
            utterance.voice = speechSynthesis.getVoices().find((voice) => voice.name === "Google UK English Female");
            utterance.rate = rate;

            // Activating the utterance
            speechSynthesis.speak(utterance);
        </script>
    @endif

    <script type="text/javascript" src="{{ asset('js/speech_recognition_end.js') }}"></script>
</x-app-layout>