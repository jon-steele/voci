
// Acquiring parameters to speak from php
let read = document.getElementById("read").textContent;
let rate = document.getElementById("rate").textContent;
let voice_style = document.getElementById("voice").textContent;


setTimeout(() => {

// Setting up the utterance
let utterance = new SpeechSynthesisUtterance(read);
utterance.rate = rate;
utterance.voice = speechSynthesis.getVoices().find(v => v.name === voice_style); //???

// Activating the utterance
speechSynthesis.speak(utterance);

}, 50);