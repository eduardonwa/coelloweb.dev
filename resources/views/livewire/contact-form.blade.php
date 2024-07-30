<div>
    <form
        class="enviar-consulta-form"
        wire:submit.prevent="submit"
        method="post"
    >
        @csrf
        <!-- info contacto -->
        <fieldset>
            <legend>Nombre</legend>
            <input type="text" id="nombre" wire:model.blur="nombre">
            @error('nombre') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset>
            <legend>Email</legend>
            <input type="email" id="email" wire:model.blur="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset>
            <legend>Nombre del negocio o proyecto</legend>
            <input type="text" id="entidad" wire:model.blur="entidad">
            @error('entidad') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <!-- proyecto -->
        <fieldset>
            <legend>Tipo de Proyecto</legend>
            <select id="tipo-proyecto" wire:model.blur="tipoProyecto" required>
                <option value="">Selecciona un tipo</option>
                <option value="Marca Blanca">Marca Blanca</option>
                <option value="Pago por uso">Pago por uso</option>
                <option value="Otro">Otro</option>
            </select>
            @error('tipoProyecto') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset>
            <legend>Link al prototipo (Adobe XD, Figma, etc)</legend>
            <input type="url" id="sitioweb" wire:model="prototipoURL">
            @error('prototipoURL') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset>
            <legend>Plazo de entrega</legend>
            <select id="plazo-entrega" wire:model.blur="plazoEntrega" required>
                <option value="">Selecciona el plazo</option>
                <option value="1 mes o menos">1 Mes o menos</option>
                <option value="1 a 3 meses">1 - 3 Meses</option>
                <option value="3 a 6 meses">3 - 6 Meses</option>
            </select>
            @error('plazoEntrega') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset>
            <legend># de páginas</legend>
            <select id="numero-paginas" wire:model="numeroPaginas" required>
                <option value="1">1</option>
                <option value="2 - 5">2 - 5</option>
                <option value="5 - 10">5 - 10</option>
                <option value="10 - 20">10 - 20</option>
            </select>
            @error('numeroPaginas') <span class="error">{{ $message }}</span> @enderror
        </fieldset>

        <!-- detalles -->
        <fieldset class="detalles">
            <legend>Detalles y resumen del proyecto</legend>
            <textarea name="detalles-proyecto" id="" maxlength="5000" style="height: 120px;"placeholder="Porfavor incluye cualquier información adicional al proyecto" wire:model.blur="detalles"></textarea>
        </fieldset>

        <!-- presupuesto -->
        <div class="presupuesto-wrap">
            <p class="presupuesto-encabezado">Presupuesto</p>
            <article class="presupuesto">
                <div class="radio-wrap">
                    <input
                        name="budget"
                        type="radio"
                        id="budget-1"
                        value="500 - 100"
                        wire:model="budget"/>
                    <label for="budget-1">500 $ - 1,000 $</label>
                </div>

                <div class="radio-wrap">
                    <input
                        name="budget"
                        type="radio"
                        id="budget-2"
                        value="1,000 - 2,000"
                        wire:model="budget" />
                    <label for="budget-2">1,000 $ - 2,000 $</label>
                </div>

                <div class="radio-wrap">
                    <input
                        name="budget"
                        type="radio"
                        id="budget-3"
                        value="2,000 - 5,000"
                        wire:model="budget" />
                    <label for="budget-3">2,000 $ - 5,000 $</label>
                </div>

                <div class="radio-wrap">
                    <input
                        name="budget"
                        type="radio"
                        id="budget-4"
                        value="5,000 - 8,000"
                        wire:model="budget" />
                    <label for="budget-4">5,000 $ - 8,000 $</label>
                </div>
            </article>
            @error('budget') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">¡Enviar!</button>
    </form>
</div>
