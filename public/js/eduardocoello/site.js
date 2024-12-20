// lazyload.js
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});
/* FIN lazyload.js */

/* Navbar scroll */
// cambiar el color de la navbar
document.addEventListener("scroll", () => {
    const siteHeader = document.querySelector(".site-header");
    if (window.scrollY > 50) {
      siteHeader.classList.add("scrolled");
    } else {
      siteHeader.classList.remove("scrolled");
    }
  });
/* FIN Navbar scroll */

/* Marquesina */
// infinite scroll para la marquesina
const scrollers = document.querySelectorAll(".scroller");
// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
addAnimation();
}
function addAnimation() {
scrollers.forEach((scroller) => {
    // add data-animated="true" to every `.scroller` on the page
    scroller.setAttribute("data-animated", true);

    // Make an array from the elements within `.scroller-inner`
    const scrollerInner = scroller.querySelector(".scroller__inner");
    const scrollerContent = Array.from(scrollerInner.children);

    // For each item in the array, clone it
    // add aria-hidden to it
    // add it into the `.scroller-inner`
    scrollerContent.forEach((item) => {
    const duplicatedItem = item.cloneNode(true);
    duplicatedItem.setAttribute("aria-hidden", true);
    scrollerInner.appendChild(duplicatedItem);
    });
});
}
/* FIN Marquesina */

/* Navbar border radius */
document.addEventListener('DOMContentLoaded', () => {
    const siteHeader = document.querySelector('.site-header');
    let lastHeight = window.innerHeight;

    function adjustCorners() {
        const currentHeight = window.innerHeight;

        if (window.matchMedia('(max-width: 767px)').matches) {
            // Desliz hacia abajo: aplica esquinas redondeadas adicionales
            if (currentHeight > lastHeight) {
                siteHeader.classList.add('estilo-esquina-abajo');
            }
            // Desliz hacia arriba: elimina esquinas adicionales
            else if (currentHeight < lastHeight) {
                siteHeader.classList.remove('estilo-esquina-abajo');
            }
        }

        lastHeight = currentHeight;
    }

    // Escuchar el evento de cambio de tamaño
    window.addEventListener('resize', adjustCorners);

    // Ejecutar la función al cargar por primera vez
    adjustCorners();
    console.log(adjustCorners());
});
/* FIN Navbar border radius */
