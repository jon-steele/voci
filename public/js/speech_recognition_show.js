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

    if (final_transcript.includes("flip") || interim_transcript.includes("flip") ||
        final_transcript.includes("next") || interim_transcript.includes("next") ||
        final_transcript.includes("skip") || interim_transcript.includes("skip"))
        {
        window.location.href = currentUrl;
        console.log('skip');
    }
    else if (final_transcript.includes("stop") || interim_transcript.includes("stop")){
        if (speechSynthesis.speaking) {
            speechSynthesis.cancel();
    
            // Make sure we don't create more than one timeout...
            if (sayTimeout !== null)
                clearTimeout(sayTimeout);
    
            sayTimeout = setTimeout(function () { say(text); }, 250);
        }
        console.log('stop');
    }
    else if (final_transcript.includes("end") || interim_transcript.includes("end") || 
        final_transcript.includes("decks") || interim_transcript.includes("decks") || 
        final_transcript.includes("home") || interim_transcript.includes("home"))
        {
        
        console.log('end');

        // Get the root URL
        var rootUrl = window.location.origin;
        console.log(rootUrl);

        // Navigate to the root directory
        window.location.href = rootUrl + '/decks/';
    }
};

recognition.start();
} else {
console.warn('Webkit Speech Recognition API is not supported.');
}