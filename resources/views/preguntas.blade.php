<x-site-layout>
    <section x-data="{ activeTab: 0 }" class="preguntas-wrap">
        <header>
            <h1>
                Preguntas Frecuentes
            </h1>
            <p>
                Porque no se trata de complicar nuestras interacciones.
                Se trata de hacerlo de manera accesible y funcional
                en todos los proyectos.
            </p>
        </header>

        <article class="preguntas-tabs">
            <button :class="{ 'active': activeTab === 0 }" @click="activeTab = 0">General</button>
            <button :class="{ 'active': activeTab === 1 }" @click="activeTab = 1">Diseño</button>
            <button :class="{ 'active': activeTab === 2 }" @click="activeTab = 2">Desarrollo</button>
            <button :class="{ 'active': activeTab === 3 }" @click="activeTab = 3">Servicios</button>
        </article>

        <article class="lista-respuestas-wrap">
            <div class="pregunta-wrap" x-show="activeTab === 0">
                <div class="pregunta" x-data="{ open: true }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿Cuánto costará desarrollar mi sitio web?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            Según los requisitos y la plataforma. <br> <br> Una landing page
                            suele ser una sola página con varias secciones, enfocada en un producto
                            o servicio. Un sitio de e-commerce necesita múltiples páginas, como
                            búsqueda y catálogo de productos.

                            <br> <br> El precio depende del presupuesto y
                            necesidades específicas del proyecto.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                            ¿Cuánto tiempo tomará en completar mi sitio web?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>Esto depende de los mismos requisitos del proyecto. <br> <br>
                            <a style="text-decoration: underline;" href="">Si tienes algo en mente</a>
                            no dudes en mandarme una solicitud para que puedas recibir un estimado.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                            ¿Qué incluye el desarrollo del sitio?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>Diseño, desarrollo, pruebas y puede incluir el lanzamiento.
                            <br> <br>
                            Cada sitio web es responsivo y tiene código limpio para facilitar actualizaciones.
                            Uso <a href="https://playwright.dev">Playwright</a> y <a href="https://puntorojo.com/blog/google-lighthouse-una-herramienta-indispensable/">Lighthouse</a> para asegurar la consistencia visual y asegurarme de que tu sitio sea veloz.
                            También integro palabras clave para mejorar el SEO.
                            <br> <br>
                            Si lo necesitas, puedo sugerirte dónde registrar tu dominio y qué proveedor de hosting contratar.
                        </p>
                    </div>
                </div>
            </div>

            <div class="pregunta-wrap" x-show="activeTab === 1">
                <div class="pregunta" x-data="{ open: true }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                            ¿Cómo será el diseño del sitio web?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            El diseño será personalizado y ajustado a tus necesidades.
                            <br> <br>
                            Podemos partir de un prototipo o bien, puedo diseñar uno
                            desde cero donde estarás al tanto de cada avance.
                            Mis diseños priorizan la experiencia del usuario, siguiendo las mejores prácticas de interfaz, colores, tipografía y más.
                            <br> <br>
                            Además, considero los objetivos del negocio, el marketing, la audiencia y tu identidad visual.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿El sitio web será responsivo y compatible con móviles?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>Sí, el sitio será totalmente responsivo y optimizado para móviles.</p>
                    </div>
                </div>
            </div>

            <div class="pregunta-wrap" x-show="activeTab === 2">
                <div class="pregunta" x-data="{ open: true }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿Cómo manejarás la seguridad del sitio web?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            Me aseguro de proteger tu sitio en sus puntos más
                            vulnerables, como los formularios donde los usuarios
                            ingresan información.
                            <br> <br>
                            Utilizo medidas de seguridad
                            para evitar ataques comunes, asegurándome de que las
                            interacciones con la base de datos sean seguras y que
                            cualquier intento de acceso no autorizado sea bloqueado.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿Cómo se realizará la optimización para motores de búsqueda (SEO)?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            El SEO se realizará mediante palabras clave y optimización técnica.
                            <br><br>
                            Utilizo <a href="https://ubersuggest.com">UberSuggest</a> y <a href="https://answerthepublic.com">AnswerThePublic</a> para identificar las mejores
                            palabras clave para tu proyecto, asegurando que el copywriting se
                            alinee con tu nicho de mercado.
                            <br> <br>
                            Y para que puedas compartir tu página web en redes sociales,
                            me aseguro de utilizar Open Graph y Twitter Meta Tags.
                        </p>
                    </div>
                </div>
            </div>

            <div class="pregunta-wrap" x-show="activeTab === 3">
                <div class="pregunta" x-data="{ open: true }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿Puedo actualizar el contenido por mi cuenta?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            Sí, te proporcionaré acceso para que puedas hacerlo fácilmente.
                            <br><br>
                            <a href="">Puedes consultar estas opciones</a> en el paquete “Estándar”
                            que te dejo en el enlace.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿Qué pasa si quiero hacer cambios en el futuro?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            Puedes contar conmigo para cualquier ajuste o arreglo
                            durante el primer mes sin costo adicional sobre lo que
                            ya está implementado.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                        ¿Tendré soporte técnico después del lanzamiento?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>
                            Sí, tendrás soporte técnico después del lanzamiento.
                            <br><br>
                            Esto incluye cualquier problema en relación con el
                            diseño, configuración de Shopify o dominio.
                            <br><br>
                            Te ayudaré a resolver cualquier incoveniente durante
                            el primer mes sin costo.
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </section>
</x-site-layout>
