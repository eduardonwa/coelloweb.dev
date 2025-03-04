export function initLottie() {
    const lottieContainers = document.querySelectorAll('.lottie');

    if (lottieContainers.length > 0) {
        // Carga Lottie dinámicamente
        import('https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.1/lottie_light.min.js').then((Lottie) => {
            lottieContainers.forEach((container) => {
                const lottiePlayers = container.querySelectorAll('.lottie-player');

                lottiePlayers.forEach((player) => {
                    const animation = Lottie.default.loadAnimation({
                        container: player,
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: player.getAttribute('data-src') // Usa el atributo data-src
                    });
                });
            });
        });
    }
}
