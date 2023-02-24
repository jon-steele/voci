if (speechSynthesis.speaking) {
    speechSynthesis.cancel();

    if (sayTimeout !== null)
    clearTimeout(sayTimeout);

    sayTimeout = setTimeout(function () { say(text); }, 250);
}