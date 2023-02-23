<x-app-layout>
    <div class="h-screen flex flex-col justify-center items-center content-center">
        @if (session('side') == 0)
            <p class="m-8">{{ $cards[$index]->front; }}</p>
            <a href="{{ route('study.show', $deck) }}"><x-primary-button>flip</x-primary-button></a>

            <div id="read" style="display: none">{{ $cards[$index]->front; }}</div>

        @else
            <p class="m-8">{{ $cards[$index]->back; }}</p>
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
    </div>

    <script>
        if ('webkitSpeechRecognition' in window) {
        var recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;
        recognition.lang = 'en-US';

        recognition.onstart = function() {
            console.log('Speech recognition started.');
        };

        recognition.onend = function() {
            console.log('Speech recognition ended.');
            recognition.start();
        };

        recognition.onresult = function(event) {
            var interim_transcript = '';
            var final_transcript = '';

            for (var i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
                final_transcript += event.results[i][0].transcript;
            } else {
                interim_transcript += event.results[i][0].transcript;
            }
            }

            if (final_transcript !== '') {
            console.log('Final transcript: ' + final_transcript);
            }

            if (interim_transcript !== '') {
            console.log('Interim transcript: ' + interim_transcript);
            }
        };

        recognition.start();
        } else {
        console.warn('Webkit Speech Recognition API is not supported.');
        }
    </script>

</x-app-layout>