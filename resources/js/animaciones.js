import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { PixiPlugin } from "gsap/PixiPlugin";

gsap.registerPlugin(PixiPlugin);
gsap.registerPlugin(ScrollTrigger);

/* inicio */
// impacto
gsap.from(".hero__image-wrap__bg", {
    delay: .5,
    opacity: 0,
    duration: 1,
    y: 100,
});

gsap.from(".hero__image-wrap__impacto", {
    delay: 1,
    opacity: 0,
    duration: 1.5,
    y: 100,
    filter: "blur(3px)",
});

// gran problema
gsap.from(".gran-problema__content__header", {
    delay: .5,
    opacity: 0,
    duration: 1,
    y: 100,
    scrollTrigger: {
        trigger: ".gran-problema__content__header",
        scrub: 1,
        start: "top bottom",
        end: "+=800"
    }
});

gsap.from(".gran-problema__content__copy", {
    delay: .5,
    opacity: 0,
    duration: 1,
    x: 300,
    scrollTrigger: {
        trigger: ".gran-problema__content__header",
        scrub: 1,
        end: "+=800"
    }
});

// porque eduardo
gsap.from(".pq-eduardo-img", {
    delay: .5,
    opacity: 0,
    duration: 1,
    x: 300,
    scrollTrigger: {
        trigger: ".porque-eduardo",
        scrub: 1,
        start: "top bottom",
        end: "+=800"
    }
});

gsap.from(".porque-eduardo__copy", {
    delay: .5,
    duration: 1,
    x: -100,
    scrollTrigger: {
        trigger: ".porque-eduardo",
        scrub: 1,
        end: "+=800"
    }
});

// servicios
const servicioCopySections = gsap.utils.toArray('.servicio-item__copy');

servicioCopySections.forEach((servicioCopy) => {
    gsap.from(servicioCopy, {
        delay: 5,
        x: 100,
        stagger: 0.2,
        scrollTrigger: {
            trigger: servicioCopy,
            scrub: 1,
            end: "+=500",
        }
    });
});

const servicioSections = gsap.utils.toArray('.servicio-img-anim');

servicioSections.forEach((servicioImg) => {
    gsap.from(servicioImg, {
        delay: .5,
        opacity: 0,
        scale: 0,
        duration: .5,
        ease: "power2.out",
        stagger: 0.2,
        y: 50,
        scrollTrigger: {
            trigger: servicioImg,
            scrub: 1,
            start: "top bottom",
            end: "+=500",
        }
    });
});

// acerca
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
/* const sections = gsap.utils.toArray('.heroe__acerca section');

let scrollTween = gsap.to(sections, {
    xPercent: -100 * (sections.length -1),
    ease: "none",
    scrollTrigger: {
        trigger: ".heroe__acerca",
        pin: true,
        scrub: 1,
        end: "+=3000"
    }
});

sections.forEach(section => {
    let text = section.querySelectorAll('.anim');
    gsap.from(text, {
        y: -130,
        opacity: 0,
        duration: 2,
        ease: "elastic",
        stagger: 0.1,
        scrollTrigger: {
            trigger: section,
            containerAnimation: scrollTween,
            start: "left center",
        }
    });
});
 */
