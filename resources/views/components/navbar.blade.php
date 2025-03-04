    <!-- navbar -->
    <div class="site-header margin-inline-4">
        <div class="container" data-type="full-bleed">
            <div class="site-header__inner | padding-block-2">

                <a class="site-header__logo" href="{{ route('welcome') }}" aria-label="Ir al inicio">
                    <img class="site-header__logo__wordmark" src="/images/ecoello-logo.svg" alt="">
                </a>

                <nav aria-label="primary navigation">
                    <ul class="nav | flex-group">
                        <li>
                            <a href="{{ route('welcome') }}" aria-label="Ir al inicio">
                                <span>Inicio</span>
                                <img src="/images/navbar-home-icon.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('acerca') }}" aria-label="Más acerca de mi">
                                <span>Acerca</span>
                                <img src="/images/navbar-acerca-icon.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.index') }}" aria-label="Checa mis servicios">
                                <span>Servicios</span>
                                <img src="/images/navbar-servicios-icon.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}" aria-label="Navega mi blog">
                                <span>Blog</span>
                                <img src="/images/navbar-blog-icon.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacto') }}" aria-label="¿Listo? Contáctame para crear tu web">
                                <span>Contacto</span>
                                <img src="/images/navbar-contacto-icon.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
