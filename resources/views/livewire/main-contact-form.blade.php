<div>
    <form
        wire:submit.prevent="submit"
        class="padding-block-8"
        method="post"
    >
        @csrf

        <!-- info contacto -->
        <fieldset class="contact-form">
            <div class="form-fields | padding-block-end-4">
                <div class="form-group padding-block-2">
                    <label for="nombre">Nombre <span aria-label="required">*</span></label>
                    <input wire:model="nombre" id="nombre" type="text" name="nombre" />
                    <div>
                        @error('nombre') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group padding-block-2">
                    <label for="email">Email <span aria-label="required">*</span></label>
                    <input wire:model="email" id="email" type="text" name="email" />
                    <div>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group padding-block-2">
                    <label for="tipo_proyecto">Proyecto *</label>
                    <x-dropdown-form>
                        <x-slot name="trigger">
                            <button type="button" class="dropdown__btn" tabindex="0" aria-haspopup="listbox" aria-expanded="isOpen">
                                <span class="clr-primary-500" style="font-size: 17px;" x-text="selected || 'Seleccionar' "></span>
                                <img src="/images/icono-chev-abajo.png" alt="">
                            </button>
                        </x-slot>
                        <ul role="listbox" style="font-size: 17px;">
                            <li @click="selected = 'Landing Page'; isOpen = false" wire:click="$set('selectedOption', 'Landing Page')" role="option">Landing Page</li>
                            <li @click="selected = 'Web Corporativa'; isOpen = false" wire:click="$set('selectedOption', 'Web Corporativa')" role="option">Web Corporativa</li>
                            <li @click="selected = 'Ecommerce'; isOpen = false" wire:click="$set('selectedOption', 'Ecommerce')" role="option">Ecommerce</li>
                        </ul>
                    </x-dropdown-form>
                    <div>
                        @error('selectedOption') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group padding-block-2">
                    <label for="phone">Teléfono <span aria-label="required">*</span></label>
                    <input wire:model="phone" id="phone" type="tel" name="phone" title="10 dígitos (ej: 4421234567)" placeholder="10 dígitos (ej: 4421234567)"/>
                    <div>
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </fieldset>

        <hr>
        
        <button type="submit" class="button" data-type="enviar-btn">
            Enviar
            <img src="/images/icono-flecha-diagonal.png" alt="icono flecha diagonal">
        </button>
    </form>
</div>
