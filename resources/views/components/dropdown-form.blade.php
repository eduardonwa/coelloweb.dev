<div
    class="dropdown"
    x-data="{ isOpen: false, selected: @entangle('selectedOption') }"
    @click.away="isOpen = false"
>
    <div @click="isOpen = !isOpen">
        {{ $trigger }}
    </div>

    <div x-show="isOpen" class="dropdown__select">
        {{ $slot }}
    </div>
</div>
