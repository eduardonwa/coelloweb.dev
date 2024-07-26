<div>
    <form wire:submit="send" method="post">

        <!-- info contacto -->
        <fieldset>
            <legend>Nombre</legend>
            <input type="text" id="nombre" wire:model="nombre">
        </fieldset>

        <fieldset>
            <legend>Email</legend>
            <input type="email" id="email" wire:model="email">
        </fieldset>

        <fieldset>
            <legend>Nombre del negocio o proyecto</legend>
                <input type="text" id="entidad" wire:model="entidad">
        </fieldset>

        <!-- proyecto -->
        <fieldset>
            <legend>Tipo de Proyecto</legend>
                <select name="tipo-proyecto" id="tipo-proyecto">
                    <option value="Marca Blanca">Marca Blanca</option>
                    <option value="Pago por uso">Pago por uso</option>
                    <option value="Otro">Otro</option>
                </select>
        </fieldset>

        <fieldset>
            <legend>Link al prototipo (Adobe XD, Figma, etc)</legend>
            <input type="url" name="sitioweb" id="sitioweb">
        </fieldset>

        <fieldset>
            <legend>Plazo de entrega</legend>
            <select name="plazo-entrega" id="plazo-entrega">
                <option value="1-mes-o-menos">1 Mes o menos</option>
                <option value="1-3-meses">1 - 3 Meses</option>
                <option value="3-6-meses">3 - 6 Meses</option>
                <option value="por-determinar">Por determinar</option>
            </select>
        </fieldset>

        <fieldset>
            <legend># de páginas</legend>
            <select name="numero-paginas" id="numero-paginas">
                <option value="1">1</option>
                <option value="2-5">2 - 5</option>
                <option value="5-10">5 - 10</option>
                <option value="10-20">10 - 20</option>
            </select>
        </fieldset>

        <!-- detalles -->
        <fieldset>
            <legend>Detalles y resumen del proyecto</legend>
            <textarea name="detalles-proyecto" id="" maxlength="5000" style="height: 120px;"></textarea>
        </fieldset>

        <!-- presupuesto -->
        <fieldset>
            <legend>Presupuesto</legend>
            <div class="radio-wrapper-47">
                <input type="radio" name="budget" id="budget-1" />
                <label for="budget-1">500 a 1,000</label>
            </div>

            <div class="radio-wrapper-47">
                <input type="radio" name="budget" id="budget-2" />
                <label for="budget-2">1,000 - 2,000</label>
            </div>

            <div class="radio-wrapper-47">
                <input type="radio" name="budget" id="budget-3" />
                <label for="budget-3">2,000 - 5,000</label>
            </div>

            <div class="radio-wrapper-47">
                <input type="radio" name="budget" id="budget-4" />
                <label for="budget-4">5,000 - 8,000</label>
            </div>
        </fieldset>

        <button type="submit">¡Enviar!</button>
    </form>
</div>
