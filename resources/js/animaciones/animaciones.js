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
    delay: .5,
    opacity: 0,
    duration: 1,
    y: 100,
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
