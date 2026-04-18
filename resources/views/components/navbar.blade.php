    <!-- navbar -->
    <div class="site-header">
        <div class="container" data-type="full-bleed">
            <div class="site-header__inner"
                x-data="{
                    openMenu: false,
                    isDesktop: window.innerWidth >= 1280
                }"
                x-init="
                    window.addEventListener('resize', () => {
                        isDesktop = window.innerWidth >= 1280
                    })
                "
                @click.outside="openMenu = false"
                @keydown.escape.window="openMenu = false"
            >
                <a class="site-header__logo" href="{{ route('welcome') }}" aria-label="Ir al inicio">
                    <img class="site-header__logo__wordmark" src="/images/ecoello-logo.svg" alt="">
                </a>

                <nav class="nav"
                    aria-label="primary navigation"
                >
                    <ul class="nav__menu"
                        x-show="openMenu || isDesktop"
                        x-transition:enter="fade-enter"
                        x-transition:enter-start="fade-enter-start"
                        x-transition:enter-end="fade-enter-end"
                        x-transition:leave="fade-leave"
                        x-transition:leave-start="fade-leave-start"
                        x-transition:leave-end="fade-leave-end"
                    >
                        <li>
                            <a href="{{ route('welcome') }}" aria-label="Ir al inicio">
                                <img src="/images/navbar-home-icon.svg" alt="">
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('acerca') }}" aria-label="Más acerca de mi">
                                <img src="/images/navbar-acerca-icon.svg" alt="">
                                <span>Acerca</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.index') }}" aria-label="Checa mis servicios">
                                <img src="/images/navbar-servicios-icon.svg" alt="">
                                <span>Servicios</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}" aria-label="Navega mi blog">
                                <img src="/images/navbar-blog-icon.svg" alt="">
                                <span>Blog</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacto') }}" aria-label="¿Listo? Contáctame para crear tu web">
                                <img src="/images/navbar-contacto-icon.svg" alt="">
                                <span>Contacto</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tienda') }}" aria-label="¿Listo? Contáctame para crear tu web">
                                <img src="/images/navbar-contacto-icon.svg" alt="">
                                <span>Tienda</span>
                            </a>
                        </li>
                    </ul>

                    <div class="trigger-wrapper">
                        <button class="button" data-type="icon" @click="openMenu = !openMenu">
                            <span x-show="!openMenu">
                                <x-icons.chevron-double-up />
                            </span>

                            <span x-show="openMenu">
                                <x-icons.chevron-down />
                            </span>
                            <span x-text="openMenu ? 'Cerrar' : 'Menú'"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
