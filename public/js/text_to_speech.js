
// Acquiring parameters to speak from php
let read = document.getElementById("read").textContent;
let rate = document.getElementById("rate").textContent;
let voice_style = document.getElementById("voice").textContent;

setTimeout(() => {

// Setting up the utterance as a global variable, so the controller scripts can access it 
utterance = new SpeechSynthesisUtterance(read);
utterance.rate = rate;
utterance.voice = speechSynthesis.getVoices().find(v => v.name === voice_style); //Not working

// Activating the utterance
speechSynthesis.speak(utterance);

}, 50);