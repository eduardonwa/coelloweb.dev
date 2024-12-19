<footer
    class="site-footer | container border-radius-1"
    data-type="wide"
>
    <section class="site-footer__content even-columns">
        <a href="{{ route('welcome') }}">
            <img src="/images/ecoello-logo-footer.svg" alt="Inicio">
        </a>

        <div class="listas | even-columns">
            <!-- info -->
            <ul>
                <h2 class="fw-bold uppercase">info</h2>
                <li>
                    <a href="{{ route('acerca') }}">Acerca</a>
                </li>
                <li>
                    <a href="{{ route('contacto') }}">Contacto</a>
                </li>
                <li>
                    <a href="{{ route('preguntas') }}">
                        Preguntas
                    </a>
                </li>
            </ul>

            <!-- links -->
            <ul>
                <h2 class="fw-bold uppercase">links</h2>
                <li>
                    <a href="{{ route('welcome') }}">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('servicios') }}">Servicios</a>
                </li>
            </ul>

            <!-- legal -->
            <ul>
                <h2 class="fw-bold uppercase">LEGAL</h2>
                    <li>
                        <a href="{{ route('privacidad') }}">
                            Privacidad
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terminos') }}">
                            Términos
                        </a>
                    </li>
            </ul>
        </div>
    </section>

    <hr class="mx-auto color-neutral-000">

    <section class="site-footer__redes">
        <a href="https://instagram.com/coelloweb">
            <img
                width="34"
                height="34"
                src="/images/icon-blanco-ig.svg"
                aria-label="Instagram de Eduardo Coello"
            >
        </a>
        <a href="https://www.facebook.com/coelloweb">
            <img
                width="34"
                height="34"
                src="/images/icon-blanco-fb.svg"
                aria-label="Facebook de Eduardo Coello"
            >
        </a>
        <a href="https://linkedin.com/in/coelloweb">
            <img
                width="34"
                height="34"
                src="/images/icon-blanco-linkedin.svg"
                aria-label="LinkedIn de Eduardo Coello"
            >
        </a>
    </section>
</footer>
