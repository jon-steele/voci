if ('webkitSpeechRecognition' in window) {
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;
    recognition.lang = 'en-US';

    recognition.onend = function() {
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

        if (final_transcript.includes("reshuffle") || interim_transcript.includes("reshuffle")){
            let deck_uuid = document.getElementById("deck_uuid").textContent;
            console.log('reshuffle');
            
            // Get the root URL
            var rootUrl = window.location.origin;

            // Navigate to the root directory
            window.location.href = rootUrl + '/study/initialize/' + deck_uuid;

        }
        else if (final_transcript.includes("again") || interim_transcript.includes("again")){
            let deck_uuid = document.getElementById("deck_uuid").textContent;
            console.log('again');

            // Get the root URL
            var rootUrl = window.location.origin;

            // Navigate to the root directory
            window.location.href = rootUrl + '/study/initialize/' + deck_uuid;
        }
        else if (final_transcript.includes("decks") || interim_transcript.includes("decks")){
            let deck_uuid = document.getElementById("deck_uuid").textContent;
            console.log('again');

            // Get the root URL
            var rootUrl = window.location.origin;

            // Navigate to the root directory
            window.location.href = rootUrl + '/decks/';
        }
    };

    recognition.start();
    } else {
    console.warn('Webkit Speech Recognition API is not supported.');
    }