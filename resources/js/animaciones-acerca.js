import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const acercaTl = gsap.timeline({
    defaults: {
        ease: "none",
    },
    scrollTrigger: {
        trigger: ".test",
        start: "top top",
        end: "+=3000",
        scrub: 1,
        pin: true,
    }
});

acercaTl.to(".hero-acerca", {
    xPercent: -50,
    duration: .5,
    opacity: 0,
});

acercaTl.from(".intro-aha h1", {
    yPercent: -1030,
    duration: 1,
});

acercaTl.from(".intro-aha img", {
    xPercent: -50,
    opacity: 0,
    duration: 1,
});

// Seleccionamos todos los elementos con la clase .aha-p
const elementos = document.querySelectorAll('.aha-p');

// Recorremos cada uno de los elementos
elementos.forEach((el, index) => {
    // Para cada elemento, creamos una animación con un retraso específico
    acercaTl.from(el, {
        yPercent: 550,
        duration: 1,
        delay: index * 0.5, // El retraso de entrada aumenta por cada elemento
    }).to(el, {
        yPercent: -50,
        duration: 0.5,
        opacity: 0,
        delay: (index + 1) * 0.5, // El retraso de salida se calcula según el índice
    });
});

acercaTl.to(".intro-aha h1", {
    yPercent: -50,
    opacity: 0,
    duration: .5,
});

acercaTl.to(".intro-aha img", {
    xPercent: 50,
    opacity: 0,
    duration: .5,
});

acercaTl.from(".declaracion", {
    scale: 0,
    opacity: 1,
    duration: 1,
});
