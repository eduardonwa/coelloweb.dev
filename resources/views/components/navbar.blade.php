    <!-- navbar -->
    <div class="site-header margin-inline-4">
        <div class="container" data-type="full-bleed">
            <div class="site-header__inner | padding-block-2">
                <a href="{{ route('welcome') }}"><img src="/images/ecoello-logo.svg" alt=""></a>
                <nav aria-label="primary navigation">
                    <ul class="nav | flex-group">
                        <li>
                            <a href="{{ route('welcome') }}">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('acerca') }}">
                                Acerca
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios') }}">
                                Servicios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacto') }}">
                                Contacto
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
