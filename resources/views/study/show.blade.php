<x-app-layout>

    @if (session('side') == 0)
        <p>{{ $cards[$index]->front; }}</p>
        <a href="{{ route('study.show', $deck) }}"><x-primary-button>flip</x-primary-button></a>

        <div id="read" style="display: none">{{ $cards[$index]->front; }}</div>

    @else
        <p>{{ $cards[$index]->back; }}</p>
        <a href="{{ route('study.show', $deck) }}"><x-primary-button>next</x-primary-button></a>

        <div id="read" style="display: none">{{ $cards[$index]->back; }}</div>
        
        {{ session(['index' => session('index') - 1]); }}
    @endif

    @if (session('voice') == "true")
        <script>
            let read = document.getElementById("read").textContent;
            let utterance = new SpeechSynthesisUtterance(read);
            speechSynthesis.speak(utterance);
        </script>
    @endif

</x-app-layout>