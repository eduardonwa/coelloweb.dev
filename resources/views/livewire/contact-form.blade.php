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
            <input type="text" id="nombre" wire:model.blur="nombre" required>
        </fieldset>

        <fieldset>
            <legend>Email</legend>
            <input type="email" id="email" wire:model.blur="email" required>
        </fieldset>

        <fieldset>
            <legend>Nombre del negocio o proyecto</legend>
            <input type="text" id="entidad" wire:model.blur="entidad" required>
        </fieldset>

        <!-- proyecto -->
        <fieldset>
            <legend>Tipo de Proyecto</legend>
            <select name="tipo-proyecto" id="tipo-proyecto" wire:model.blur="tipoProyecto" required>
                <option value="">Selecciona un tipo</option>
                <option value="Marca Blanca">Marca Blanca</option>
                <option value="Pago por uso">Pago por uso</option>
                <option value="Otro">Otro</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Link al prototipo (Adobe XD, Figma, etc)</legend>
            <input type="url" name="sitioweb" id="sitioweb" wire:model="prototipoURL">
        </fieldset>

        <fieldset>
            <legend>Plazo de entrega</legend>
            <select name="plazo-entrega" id="plazo-entrega" wire:model.blur="plazoEntrega" required>
                <option value="1-mes-o-menos">1 Mes o menos</option>
                <option value="1-3-meses">1 - 3 Meses</option>
                <option value="3-6-meses">3 - 6 Meses</option>
            </select>
        </fieldset>

        <fieldset>
            <legend># de páginas</legend>
            <select name="numero-paginas" id="numero-paginas" wire:model="numeroPaginas" required>
                <option value="1">1</option>
                <option value="2-5">2 - 5</option>
                <option value="5-10">5 - 10</option>
                <option value="10-20">10 - 20</option>
            </select>
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
                        type="radio"
                        name="budget"
                        id="budget-1"
                        value="500-100"
                        wire:model="budget"/>
                    <label for="budget-1">500 $ - 1,000 $</label>
                </div>

                <div class="radio-wrap">
                    <input
                        type="radio"
                        name="budget"
                        id="budget-2"
                        value="1,000-2,000"
                        wire:model="budget" />
                    <label for="budget-2">1,000 $ - 2,000 $</label>
                </div>

                <div class="radio-wrap">
                    <input
                        type="radio"
                        name="budget"
                        id="budget-3"
                        value="2,000-5,000"
                        wire:model="budget" />
                    <label for="budget-3">2,000 $ - 5,000 $</label>
                </div>

                <div class="radio-wrap">
                    <input
                        type="radio"
                        name="budget"
                        id="budget-4"
                        value="5,000-8,000"
                        wire:model="budget" />
                    <label for="budget-4">5,000 $ - 8,000 $</label>
                </div>
            </article>
        </div>

        <button type="submit">¡Enviar!</button>
    </form>
</div>
