<div>
    @if ($showModal)
        <dialog
            x-data="{isOpen: @entangle('showModal')}"
            x-show="isOpen"
            x-transition
            class="gracias-dialog"
        >
            <article class="gracias-dialog__wrapper | relative">
                <button
                    @click="isOpen = false"
                    class="button | gracias-modal-close"
                    data-type="close"
                    aria-label="Cerrar modal"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12" />
                    </svg>
                </button>
                <!-- contenido del modal -->
                <div class="gracias-dialog__wrapper__msg">
                    <h2 class="heading-2">¡Gracias por tu mensaje!</h2>
                    <p>Me comunicaré contigo lo más pronto posible.</p>
                </div>

                <div class="gracias-dialog__wrapper__redes">
                    <h2 class="fs-500">Sígueme en mis redes sociales</h2>
                    <a href="https://www.facebook.com/coelloweb"> Facebook </a>
                    <a href="https://www.instagram.com/eduardocoelloweb"> Instagram </a>
                </div>
            </article>
        </dialog>
    @endif
</div>
