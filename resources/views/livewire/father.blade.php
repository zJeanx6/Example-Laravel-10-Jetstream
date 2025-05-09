<div>
    @persist('player')
        <audio src="{{ asset('audios/TruenoAtrevido.mp3') }}" controls></audio>
    @endpersist

    <x-button wire:click="redirigir">Ir a prueba</x-button>

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

        @livewire('contador', [], key('contador-2'))

        @livewire('contador', [], key('contador-3'))

        @livewire('contador', [], key('contador-4'))

        @livewire('contador', [], key('contador-5'))

        <livewire:contador key="contador-3" />
    </div>


    @push('js')
        <script>
            //Desde livewire, se generan interferencias al trabajar un SPA con js y livewire. 
            //Siempre utilizaremos la directiva Stack y push 'JS' para cargar el JS despues de que se haya cargado toda la pagina.
            //Si no quieres batallar utilizando JavaScript Inline, utilza la libreria AlpineJS ya que con esta libreria se sincroniza muy bien con livewire.

            // const b = 'hola mundo'
            // console.log('hola mundo')

            // let a = 0;
            // setInterval(() => {
            //     a++;
            //     console.log(a);
            // }, 1000);
        </script>

        {{-- esto "data-navigate-once" va a hacer que se ejecute una sola vez por medio de las redirecciones de livewire --}}
        <script data-navigate-once>
            var c = 'hola mundo'
            console.log(c)
        </script>

    @endpush


</div>
