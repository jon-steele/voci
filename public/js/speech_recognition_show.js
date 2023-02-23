var currentUrl = window.location.href;

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

    if (final_transcript.includes("flip") || interim_transcript.includes("flip")){
        console.log('flip');
        // Refresh the page
        window.location.href = currentUrl;
    }
    else if (final_transcript.includes("next") || interim_transcript.includes("next")){
        // Refresh the page
        window.location.href = currentUrl;
        console.log('next');
    }
    else if (final_transcript.includes("skip") || interim_transcript.includes("skip")){
        // Refresh the page
        window.location.href = currentUrl;
        console.log('skip');
    }
};

recognition.start();
} else {
console.warn('Webkit Speech Recognition API is not supported.');
}