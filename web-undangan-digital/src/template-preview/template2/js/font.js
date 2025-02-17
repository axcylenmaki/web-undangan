const font = new FontFaceObserver('Josefin Sans');
font.load().then(() => {
    document.body.classList.add('fonts-loaded');
});