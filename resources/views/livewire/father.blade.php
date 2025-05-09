<div>

    <h1 class="text-2xl font-semibold">Soy el componente padre</h1>
    
    <x-input wire:model.live="name" />

    <hr class="my-6">

    <div>
        {{-- con este podemos pasa muchas propiedades al hijo pero no mutarlas desde el hijo en tiempo real --}}
        {{-- @livewire('children', [
            'name' => $name,
        ]) --}}

        {{-- con este podemos sincronizar una propiedad bidireccional --}}
        {{-- <livewire:children wire:model="name" /> --}}
        {{-- en caso de querer mutar muchas propiedades bidireccionalmente toca utilziar los eventos --}}

        @livewire('contador', [], key('contador-1'))

        @livewire('contador', [], key('contador-1'))

        @livewire('contador', [], key('contador-1'))

        @livewire('contador', [], key('contador-1'))

        @livewire('contador', [], key('contador-1'))

        <livewire:contador key="contador-3"/>
    </div>

</div>
