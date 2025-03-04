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
                            Según los requisitos y la plataforma que requieras. <br> <br>
                            Una landing page suele ser una estrategia que busca una acción concreta por el usuario.
                            Un sitio e-commerce en Shopify, necesita múltiples páginas para que tu negocio pueda
                            convertir y ser confiable.
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
                            <a style="text-decoration: underline;" href="mailto:coelloweb@aol.com?subject=Envio%20de%20solicitud">Si tienes algo en mente</a>
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
                            Uso <a target="_blank" href="https://medium.com/somos-pragma/automatizaci%C3%B3n-de-pruebas-web-simplificada-con-playwright-a0d38b9afc79">Playwright</a>
                            y <a target="_blank" href="https://puntorojo.com/blog/google-lighthouse-una-herramienta-indispensable/">Lighthouse</a> para asegurar la consistencia visual
                            y optimización de velocidad. También integro palabras clave para mejorar tu desempeño en Google, Bing, Yahoo, etc.
                            <br> <br>
                            También puedo sugerirte dónde registrar tu nombre de dominio y qué proveedor de hosting contratar.
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                            ¿Ofreces estrategias de marketing?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>No, pero es importante resaltar que una página web puede facilitarte la creación de estas estrategias.
                            <br> <br>
                            Es decir que podrás vincular tu sitio web con otros servicios como Google Analytics y/o Google Ads para crear
                            campañas publicitarias y medir el rendimiento de tu página.
                            <br> <br>
                        </p>
                    </div>
                </div>

                <div class="pregunta" x-data="{ open: false }">
                    <span @click="open = !open" class="cursor-pointer">
                        <img src="{{ asset('images/icon-pregunta.svg') }}">
                            ¿Ofreces estrategias de SEO?
                    </span>
                    <div class="respuesta" x-show="open" x-transition>
                        <p>No, pero al finalizar te compartiré una lista con 10 palabras clave para que puedas
                            formalizar tus estrategias de contenido.
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
                            Puedes mandarme una liga hacia un prototipo para implentar su código
                            desde el mismísimo comienzo. Pero si no cuentas con algo previamente diseñado,
                            puedo diseñar tu propuesta desde cero el cual siempre podrás revisar.
                            Mis diseños priorizan la experiencia del usuario,  siguiendo las mejores prácticas de
                            interfaz, colores, tipografía, y más.
                            <br> <br>
                            Considero también tus objetivos de negocio, tu audiencia, identidad visual, etc.
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
                            Utilizo <a target="_blank" href="https://ubersuggest.com">UberSuggest</a>
                            y <a target="_blank" href="https://answerthepublic.com">AnswerThePublic</a>
                            para identificar las mejores palabras clave, asegurándome que el
                            copywriting se alinee con tu audiencia.
                            Al final te daré una lista con 10 palabras clave para que puedas seguir nutriendo
                            tus estrategias SEO.
                            <br> <br>
                            Y para que puedas compartir tu página web en redes sociales con seguridad,
                            incorporo etiquetas <a target="_blank" href="https://desarrolloweb.com/articulos/tags-open-graph-facebook.html">Open Graph</a>
                            y Twitter Meta Tags.
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
