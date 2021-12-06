<div>


    <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
        <h1 class="text-3xl font-bold">Secciones del Post</h1>
        <hr class="mt-2 mb-6">
        <div class="min-w-full mx-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-lg overflow-hidden sm:rounded-lg">
            @foreach ($post->sections as $item)
                <article class="mb-6">
                    <div class="order-1 lg:order-2 w-full bg-gray-100 shadow-lg p-3 rounded-md tracking-wid">
                        @if ($section->id == $item->id)
                            <form wire:submit.prevent="$emit('editar', {{$item}})">
                                @error('section.subtitle')
                                    <input wire:model="section.subtitle"
                                    type="text"
                                    class="block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    placeholder="ingrese el Subtitulo de la seccion"
                                    aria-describedby="subtitulo">
                                    <small id="subtitulo" class="text-red-600 font-medium">
                                        {{$message}}
                                    </small>
                                @else
                                    <div class="mt-3">
                                        <input wire:model="section.subtitle"
                                        type="text"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        placeholder="ingrese el subtitulo de la seccion"
                                        aria-describedby="subtitulo">
                                        <small id="subtitulo" class=" text-gray-600 font-medium">
                                            Escribe el subtitulo de la seccion
                                        </small>
                                    </div>

                                    <div class="mt-3">
                                        <textarea wire:model="section.description"
                                        aria-describedby="descripcion"
                                        @if ($item->description)
                                            rows="10"
                                        @else
                                            rows="3"
                                        @endif
                                        placeholder="Este es el contenido de la sección"
                                        class="block mt-1 w-full h-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        </textarea>
                                        <small id="descriptcion" class=" text-gray-600 font-medium">
                                            Agrega el contenido del seccion
                                        </small>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Guardar
                                        </button>
                                    </div>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between items-center">
                                <h1 wire:click="edit({{$item}})" class="cursor-pointer"><strong>Seccion:</strong> {{$item->subtitle}}</h1>
                                <div>
                                    <i title="editar" class="fas fa-edit text-lg cursor-pointer hover:text-gray-600"
                                    wire:click="edit({{$item}})"></i>
                                    <i title="borrar" class="fas fa-eraser text-lg cursor-pointer text-red-600 hover:text-red-900"
                                    wire:click="$emit('eliminar', {{$item}})"></i>
                                </div>
                            </header>
                        @endif
                    </div>
                </article>
            @endforeach

            <div x-data="{open:false}">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 ml-1 mr-3"></i>
                    Agregar Nueva Sección
                </a>

                <div x-show="open" class="mb-6">
                    <div class="order-1 lg:order-2 w-full bg-gray-100 shadow-lg p-3 rounded-md tracking-wid">
                        <h1 class="text-xl font-bold">
                            Agregar Nueva seccion
                        </h1>
                        <div>
                            @error('subtitle')
                                <input type="text"
                                wire:model="subtitle"
                                class="block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="Escribe el Subtitulo de la Seccion"
                                aria-describedby="nameSeccion">
                                <small id="nameSeccion" class=" text-red-600 font-medium">
                                    Debes poner un subtitulo a tu sección
                                </small>
                            @else
                                <div>
                                    <input type="text"
                                    wire:model="subtitle"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    placeholder="Escribe el Subtitulo de la Seccion"
                                    aria-describedby="nameSeccion">
                                    <small id="nameSeccion" class=" text-gray-600 font-medium">
                                        Agregale el subtitulo a tu sección del post
                                    </small>
                                </div>
                                <div class="mt-3">
                                    <textarea wire:model="description"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    name="" id="" placeholder="Escribe el Subtitulo de la Seccion"></textarea>
                                </div>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-3">
                            <button x-on:click="open = false" type="button" class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Cancelar
                            </button>
                            <button wire:click="store" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Agregar
                            </button>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            Livewire.on('editar', seccionId =>{
                Swal.fire({
                    title: '¿Estás seguro de realizar estos cambios?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    denyButtonText: `No Guardar`,
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Livewire.emit('update', seccionId)
                    } else if (result.isDenied) {
                        Livewire.emit('resetear', seccionId)
                        Swal.fire('No se guardaron los cambios', '', 'info')
                    }else{
                        Livewire.emit('resetear', seccionId)
                    }

                })
            })
            Livewire.on('eliminar', seccionId =>{
                Swal.fire({
                    title: '¿Estás Seguro?',
                    text: "¡No podrás revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ¡Elimínalo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Eliminado',
                            'Tu registro se ha eliminado',
                            'success    '
                        )
                        Livewire.emit('destroy', seccionId)
                    }
                })
            })
        </script>
    @endpush
</div>
