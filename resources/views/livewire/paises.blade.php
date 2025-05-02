<div>

    {{-- @livewire('hijo') --}}


    {{-- con esto podemos resetear el contador utilizando un metodo tradicional
     <x-button class="mb-4" wire:click="resetear">
        Resetear
    </x-button> --}}

    {{-- Pero cuando se trata de una accion pequeña tambien podemos utilizar 
    el metodo magico $set('propiedad', valor) --}}
    <x-button class="mb-4" wire:click="set('count', 0)">
        Resetear
    </x-button>

    <br>

    {{-- Metodo magico $toggle para cambia el valor de un booleano, en este caso
    muestra o uculta la vista segun el valor de la propiedad open, ya sea true o false --}}
    <x-button class="mb-4" wire:click="$toggle('open')">
        Mostrar/Ocultar
    </x-button>

    <form class="mb-4" wire:submit="save">
        <x-input    wire:model="pais" 
                    placeholder="Ingrese un pais nuevo"
                    {{-- wire:keydown="increment" Ejecuta el metodo increment
                    Para incrementar a la escucha de una tecla especifica o
                    cualquiera como el ejemplo --}}
                    wire:keydown.space="increment"/>
        <x-button>Agregar</x-button>
    </form>

    @if ($open)
        <ul class="list-disc list-inside space-y-2">
            @foreach ($paises as $index => $pais)
                <li wire:key="pais-{{ $index }}">

                    <span wire:mouseenter="changeActive('{{ $pais }}')">
                        ({{ $index }})
                        {{ $pais }}
                    </span>
                    <x-danger-button wire:click="delete({{ $index }})">X</x-danger-button>
                </li>
            @endforeach
        </ul>
    @endif

    {{ $active }}
    <br>
    Su contador esta en {{ $count }}
</div>
