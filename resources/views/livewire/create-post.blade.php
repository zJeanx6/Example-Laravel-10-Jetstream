<div>
    {{-- TODO EL CONTENIDO DEBE ESTAR DENTRO DE ESTE DIV, NO SE PUEDE UBICAR POR FUERA, YA QUE ES UN CONTENEDOR PADRE, SINO EL RENDERIZADO FALLA --}}
    <div class="">
        <h1>Hola desde el componente</h1>
        <h1>{{ $name }}</h1>
        <h1>{{ $email }}</h1>
        <h1>{{ $title }}</h1>
    </div>
    <br>
    <div class="">
        {{-- Puedo agreagrle .live al wire:model para ver los cambios del input en tiempo real --}}
        <x-input type="text" wire:model="name" />

        <x-button wire:click="save">
            Save
        </x-button>
    </div>

    {{$name}}


</div>
