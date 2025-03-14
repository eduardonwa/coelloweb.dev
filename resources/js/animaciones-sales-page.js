import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { PixiPlugin } from "gsap/PixiPlugin";

gsap.registerPlugin(PixiPlugin);
gsap.registerPlugin(ScrollTrigger);

gsap.from(".agitacion", {
    delay: .5,
    opacity: 0,
    duration: 1,
    y: 100,
    scrollTrigger: {
        trigger: ".agitacion",
        scrub: 1,
        start: "top bottom",
        end: "+=800",
    }
});

gsap.from(".porque-esto-imagen", {
    delay: .5,
    opacity: 0,
    duration: 1,
    x: 100,
    scrollTrigger: {
        trigger: ".porque-esto-imagen",
        scrub: 1,
        start: "top right",
        end: "+=500",
    }
})

const loQueNecesitas = gsap.utils.toArray('.lo-que-necesitas__lista__item');
loQueNecesitas.forEach((necesitasLista) => {
    gsap.from(necesitasLista, {
        delay: 5,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        x: () => window.innerWidth < 768 ? 0 : 100, // Ajusta el valor de x según el tamaño de la pantalla
        scrollTrigger: {
            trigger: necesitasLista,
            scrub: 1,
            end: "+=400",
        }
    });
});

const bondadesHeader = gsap.utils.toArray('.bondades__lista__item__header');
bondadesHeader.forEach((bondadesTitulos) => {
    gsap.from(bondadesTitulos, {
        opacity: 0,
        duration: 1.5,
        stagger: 0.2,
        scrollTrigger: {
            trigger: bondadesTitulos,
            scrub: 1,
            end: "+=400",
        }
    })
})

const bondadesCopy = gsap.utils.toArray('.bondades__lista__item__copy');
bondadesCopy.forEach((bondadesTextos) => {
    gsap.from(bondadesTextos, {
        y: 100,
        scrollTrigger: {
            trigger: bondadesTextos,
            scrub: 1,
            end: "+=400",
        }
    })
})

gsap.from(".unica-opcion-header", {
    delay: .5,
    opacity: 0,
    duration: 1,
    x: () => window.innerWidth < 768 ? 0 : 200, // Ajusta el valor de x según el tamaño de la pantalla
    scrollTrigger: {
        trigger: ".unica-opcion-header",
        scrub: 1,
        start: "top right",
        end: "+=500",
    }
})

gsap.from(".que-incluye-header", {
    delay: .5,
    opacity: 0,
    duration: 1,
    x: () => window.innerWidth < 768 ? 0 : -200, // Ajusta el valor de x según el tamaño de la pantalla
    scrollTrigger: {
        trigger: ".que-incluye-header",
        scrub: 1,
        start: "top right",
        end: "+=500",
    }
})

const desglosePrecio = gsap.utils.toArray('.desglose-precios__descripcion');
desglosePrecio.forEach((precios) => {
    gsap.from(precios, {
        y: () => window.innerHeight < 896 ? 0 : 200,
        opacity: 0,
        duration: 2,
        delay: .5,
        scrollTrigger: {
            trigger: precios,
            scrub: 1,
            end: "+=400",
        }
    })
})

gsap.from(".porque-yo", {
    delay: .5,
    opacity: 0,
    duration: 1,
    stagger: 0.2,
    y: () => window.innerHeight < 896 ? 0 : 200,
    scrollTrigger: {
        trigger: ".porque-yo",
        scrub: 1,
        start: "top right",
        end: "+=500",
        marker: true,
    }
})

gsap.from(".candidato-adecuado__copy", {
    delay: .5,
    opacity: 0,
    duration: 1,
    stagger: 0.2,
    y: () => window.innerHeight < 896 ? 0 : 200,
    scrollTrigger: {
        trigger: ".candidato-adecuado__copy",
        scrub: 1,
        start: "top right",
        end: "+=500",
        marker: true,
    }
})