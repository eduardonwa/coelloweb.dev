    <!-- navbar -->
    <div class="site-header margin-inline-4">
        <div class="container" data-type="full-bleed">
            <div class="site-header__inner | padding-block-2">

                <a class="site-header__logo" href="{{ route('welcome') }}">
                    <img class="site-header__logo__wordmark" src="/images/ecoello-logo.svg" alt="">
                    {{-- <img class="site-header__logo__icon" src="/images/ecoello-icon.svg" alt=""> --}}
                </a>

                <nav aria-label="primary navigation">
                    <ul class="nav | flex-group">
                        <li>
                            <a href="{{ route('welcome') }}">
                                <span>Inicio</span>
                                <img src="/images/navbar-home-icon.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('acerca') }}">
                                <span>Acerca</span>
                                <img src="/images/navbar-acerca-icon.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios') }}">
                                <span>Servicios</span>
                                <img src="/images/navbar-servicios-icon.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">
                                <span>Blog</span>
                                <img src="/images/navbar-blog-icon.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacto') }}">
                                <span>Contacto</span>
                                <img src="/images/navbar-contacto-icon.png" alt="">
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
