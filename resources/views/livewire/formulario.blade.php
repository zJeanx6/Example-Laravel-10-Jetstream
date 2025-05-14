<div>

    <div class="bg-white shadow rounded-md p-6 mb-8">

        @if ($postCreate->image)
            <img src="{{ $postCreate->image->temporaryUrl() }}" alt="">
        @endif

        <form wire:submit="save">

            <div class="mb-4">
                <x-label>Nombre</x-label>
                <x-input class="w-full" wire:model.live="postCreate.title" />
                <x-input-error for='postCreate.title'></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>Contenido</x-label>
                <x-textarea class="w-full" wire:model="postCreate.content" />
                <x-input-error for='postCreate.content'></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>Imagen</x-label>
                    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <!-- File Input -->
                        <x-input type="file" wire:model="postCreate.image" wire:key="{{ $postCreate->imageKey }}" />

                        <!-- Progress Bar -->
                        <div x-show="uploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
            </div>

            <div class="mb-4">
                <x-label>Categoria</x-label>
                <x-select place class="w-full" wire:model.live="postCreate.category_id">
                    <option value="" disabled>
                        Selecciona una categoria
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error for='postCreate.category_id'></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>Etiquetas</x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model="postCreate.tags" value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <x-input-error for='postCreate.tags' />
            </div>

            <div class="flex justify-end">
                {{-- puedo utilizar el loading desde el boton de varias formas.
                class="opacity-25" wire:loading.remove.class="opacity-25" --}}
                {{-- class="disabled:opacity-25" wire:loading.attr="disabled" --}}
                <x-button >
                    Crear
                </x-button>
            </div>
        </form>

        {{-- class="flex justify-between" wire:loading --}}
        {{-- class="flex justify-between" wire:loading.flex --}}
        {{-- delay se ejecuta unicamente en el caso de que el timepo de ejecucion dure mas de 200ms --}}
        {{-- <div class="flex justify-between" wire:loading.delay> 
            <div>
                hola mundo
            </div>
            <div>mundo</div>
        </div> --}}

        {{-- Si coloco wire:loading.remove hace el mismo proceso pero al revés --}}
        {{-- <div wire:loading wire:model="save">
            Procesando...
        </div> --}}

    </div>

    <div class="bg-white shadow rounded-md p-6">

        <div class="mb-4">
            <x-input class="w-full" placeholder="Buscar..." wire:model.live="search"/>
        </div>

        <ul class="list-disc list-inside space-y-2">
            @foreach ($posts as $post)
                <li class="flex justify-between" wire:key="post-{{ $post->id }}">
                    {{ $post->title }}
                    <div>
                        <x-button wire:click="edit({{ $post->id }})">
                            Editar
                        </x-button>
                        <x-danger-button wire:click="destroy({{ $post->id }})">
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        {{$posts->links(data: ['scrollTo' => false])}}
    </div>

    <form wire:submit="update">
        <x-dialog-modal wire:model="postEdit.open">

            <x-slot name="title">
                Actualizar post
            </x-slot>

            <x-slot name="content">
                <form wire:submit="update">
                    <div class="mb-4">
                        <x-label>Nombre</x-label>
                        <x-input class="w-full" wire:model="postEdit.title" />
                        <x-input-error for='postEdit.title'></x-input-error>
                    </div>

                    <div class="mb-4">
                        <x-label>
                            Contenido
                        </x-label>
                        <x-textarea class="w-full" wire:model="postEdit.content" />
                        <x-input-error for='postEdit.content'></x-input-error>
                    </div>

                    <div class="mb-4">
                        <x-label>
                            Categoria
                        </x-label>
                        <x-select place class="w-full" wire:model="postEdit.category_id">
                            <option value="" disabled>
                                Selecciona una categoria
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for='postEdit.category_id'></x-input-error>
                    </div>

                    <div class="mb-4">
                        <x-label>
                            Etiquetas
                        </x-label>
                        <ul>
                            @foreach ($tags as $tag)
                                <li>
                                    <label>
                                        <x-checkbox wire:model="postEdit.tags" value="{{ $tag->id }}" />
                                        {{ $tag->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        <x-input-error for='postEdit.tags'></x-input-error>
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-danger-button class="mr-2" wire:click="$set('postEdit.open', false)">
                        Cancelar
                    </x-danger-button>
                    <x-button>
                        Actualizar
                    </x-button>
                </div>
            </x-slot>

        </x-dialog-modal>
    </form>

    @push('js')
        <script>
            // document.addEventListener('livewire:initialized', function(){
            //     Livewire.on('post-created', function(comment) {
            //         console.log(comment[0])
            //     });
            // });

            Livewire.on('post-created', function(comment) {
                console.log(comment[0])
            });
        </script>
    @endpush
</div>
