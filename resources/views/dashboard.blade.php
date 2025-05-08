<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @php
        $type = 'danger'
    @endphp

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- <x-alert class='' id='alert' :type='$type' title="Title enviado desde el atributo">
                
                <x-slot name='title'>
                    Title enviado desde el slot
                </x-slot>

                <p>texto de prueba para el parrafo</p>
            </x-alert> --}}

            {{-- @livewire('create-post', [
                'title' => 'Titulo',
                'user' => 1
            ]) --}}

            {{-- @livewire('contador') --}}

            {{-- @livewire('paises') --}}

            @livewire('formulario')

            <div class="mt-8">
                @livewire('comments')
            </div>
            
            <br>

            <p>Footer dashboard</p>

        </div>
    </div>


</x-app-layout>
