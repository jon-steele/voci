<x-app-layout>

    <div>
        <select name="voice" id="voices">
            <option value="">Select a voice</option>
        </select>

        <label for="rate">Rate:</label>
        <input type="range" name="rate" min="0" max="3" value="1" step="0.1">

        <textarea name="text">Somthing to say</textarea>
        <button id="stop">Stop</button>
        <button id="speak" onclick="startSpeech()">Speak</button>
    </div>

</x-app-layout>

<script>
    var msg = new SpeechSynthesisUtterance();
    let voices = [];
    const voicesDropdown = document.querySelector('[name="voice"]');
    const options = document.querySelectorAll('[type="range"], [name="text"]');
    const speakButton = document.querySelector('#speak')
    const stopButton = document.querydSelector('#stop');
    msg.text = document.querySelector('[name="text"]').value;

    function populateVoices() {
        voices = this.getVoices();
        voicesDropdown.innerHTML = voices
            .map(voice => `<option value="${voice.name}">${voice.name} (${voice.lang})</option>`).join('');
    }

    function setVoice() {
        msg.voice = voices.find(voice => voice.name === this.value);
    }

    function startSpeech() {
        msg.text = document.querySelector('[name="text"]').value;
        speechSynthesis.cancel();
        speechSynthesis.speak(msg);
    }

    function setOption() {
        
    }

    speechSynthesis.addEventListener('voiceschanged', populateVoices);
    voicesDropdown.addEventListener('change', setVoice);
    options.forEach(option => option.addEventListener('change', setOption))
</script>