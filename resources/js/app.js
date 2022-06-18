(function () {
    const script = document.createElement('script');
    script.type = 'text/javascript';
    script.onload = function () {
        Nop.init(window.filamentData.nop);
    };
    script.src = 'https://nop.is/js/sdk.js';

    document.querySelector('body').appendChild(script);
})();
