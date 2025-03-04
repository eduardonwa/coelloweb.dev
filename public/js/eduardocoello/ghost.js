// efecto glow
(function setGlowEffectRx() {
    const glowEffects = document.querySelectorAll('.glow-effect');

    glowEffects.forEach(glowEffect => {
        const glowLines = glowEffect.querySelectorAll('rect');
        const rx = getComputedStyle(glowEffect).borderRadius;

        glowLines.forEach(line => {
            line.setAttribute('rx', rx);
        });
    })
})();

// resaltar los bordes del fieldset
document.querySelectorAll('.enviar-consulta-form input, .enviar-consulta-form select, .enviar-consulta-form textarea')
    .forEach(element => {
        // evento focus
        element.addEventListener('focus', () => {
            const fieldset = element.closest('fieldset');
            fieldset.classList.add('focused');
        });
        // evento blur
        element.addEventListener('blur', () => {
            const fieldset = element.closest('fieldset');
            fieldset.classList.remove('focused');
        });
    });

// mostrar dialogo de solicitud
const buttons = document.querySelectorAll('.cta-button');
const dialog = document.getElementById('solicitudDialogo');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        dialog.showModal();
        dialog.classList.add('show');
    });
});

// animaciones
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
});

const hiddenElements = document.querySelectorAll('.hidden, .hidden-two, .hidden-three');
hiddenElements.forEach((el) => observer.observe(el));
