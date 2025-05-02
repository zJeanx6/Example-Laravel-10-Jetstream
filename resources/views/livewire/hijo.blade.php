<div>
    {{-- Utilizo el metodo magico $parent. para acceder a un metodo de la clase pase --}}
    <x-button class="mb-4" wire:click="$parent.increment">
        incrementar
    </x-button>
</div>
