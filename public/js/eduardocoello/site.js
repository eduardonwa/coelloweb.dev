// lazyload.js
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});
/* FIN lazyload.js */

// Navbar Scroll y Border Radius
document.addEventListener('DOMContentLoaded', () => {
    const siteHeader = document.querySelector('.site-header');
    let lastHeight = window.innerHeight;

    function adjustCorners() {
        const currentHeight = window.innerHeight;

        if (window.matchMedia('(max-width: 767px)').matches) {
            if (currentHeight > lastHeight) {
                siteHeader.classList.add('estilo-esquina-abajo');
            } else if (currentHeight < lastHeight) {
                siteHeader.classList.remove('estilo-esquina-abajo');
            }
        }
        lastHeight = currentHeight;
    }

    window.addEventListener('resize', adjustCorners);
    adjustCorners();

    document.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            siteHeader.classList.add("scrolled");
        } else {
            siteHeader.classList.remove("scrolled");
        }
    });
});

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

/* Centrar imagenes dentro de un p con text-align:center */
document.addEventListener('DOMContentLoaded', function() {
    // Seleccionamos todos los <p> dentro de .blog-post__body que contienen una <img>
    const paragraphsWithImages = document.querySelectorAll('.blog-post__body p img');

    paragraphsWithImages.forEach(img => {
        // Verificamos que la imagen está dentro de un <p> centrado
        const p = img.closest('p');
        if (p && p.style.textAlign === 'center') {
            // Aplicamos los estilos necesarios a la imagen
            img.style.display = 'block';  // Hace que la imagen se comporte como un bloque
            img.style.marginLeft = 'auto';  // Centra la imagen hacia la izquierda
            img.style.marginRight = 'auto'; // Centra la imagen hacia la derecha
        }
    });
});

// quitar el fondo de terminos y privacidad
const currentPage = window.location.pathname.replace(/\/$/, ""); // Remueve el slash final si existe.
const removeBgFromPage = ["/terminos", "/privacidad"];
const fadedClass = document.querySelector(".faded-bg");

if (removeBgFromPage.includes(currentPage) && fadedClass) {
    fadedClass.classList.remove("faded-bg");
}
