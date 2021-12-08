<section class="mt-4 w-full">
    <h3 class="ml-3 text-2xl font-bold text-gray-800 tracking-wide mb-2">Comentarios</h3>
    {{-- Formulario de Comentario --}}


    @auth
    <article class="mb-3">
        @can('valued', $post)
            <textarea wire:model="comment"
            class="block mt-1 w-full h-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            placeholder="Escribe un Comentario"></textarea>
            <div class="flex mt-2 justify-beetween">
                <ul class="flex text-lg mr-auto" title="calificar el post">
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                        <i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                        <i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                        <i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                        <i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                        <i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                </ul>

                <button x-on:click="open = false" 
                    type="button" 
                    class="mr-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </button>
                <button wire:click="store" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Agregar
                </button>
            </div>
        @else
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>Usted ya califico este post</p>
            </div>
        @endcan
    </article>
    @endauth

    <div class="order-1 min-w-full lg:order-2 bg-gray-50 shadow-lg max-w-sm p-6 rounded-md tracking-wide">
        <p class="text-gray-800 mb-2">{{$post->reviews->count()}} Valoraciones</p>
        @foreach ($post->reviews as $review)
            <article class="mb-4">    
                @if ($publicacion->id == $review->id)
                    <form wire:submit.prevent="update">
                        @error("publicacion.comment")
                            <label for="comentario" class="block font-semibold text-base text-red-700">Editar Comentario</label>
                            <input wire:model="publicacion.comment" id="comentario"
                            class="block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            type="text" placeholder="Escribe un Comentario">
                            <small id="subtitulo" class="text-red-600 font-medium">
                                Este campo es obligatorio
                            </small>
                        @else
                            <label for="comentario" class="block font-semibold text-base text-gray-700">Editar Comentario</label>
                            <input wire:model="publicacion.comment" id="comentario"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            type="text" placeholder="Escribe un Comentario">

                            <label for="comentario" class="mt-3 block font-semibold text-base text-gray-700">Calificación</label>
                            <ul class="flex text-lg mr-auto mb-2" title="calificar el post">
                                <li class="mr-1 cursor-pointer" wire:click="$set('publicacion.rating', 1)">
                                    <i class="fas fa-star text-{{$publicacion->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('publicacion.rating', 2)">
                                    <i class="fas fa-star text-{{$publicacion->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('publicacion.rating', 3)">
                                    <i class="fas fa-star text-{{$publicacion->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('publicacion.rating', 4)">
                                    <i class="fas fa-star text-{{$publicacion->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('publicacion.rating', 5)">
                                    <i class="fas fa-star text-{{$publicacion->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                            </ul>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Guardar
                            </button>
                        @enderror
                    </form>
                @else
                    @auth
                        @if ($review->user_id == auth()->user()->id)
                            <div class="flex">
                                <figure>
                                    <img src="{{$review->user->profile_photo_url}}"
                                    title="{{$review->user->name}}"
                                    alt="{{$review->user->name}}"
                                    class="h-12 w-12 object-cover rounded-full shadow-lg">
                                </figure>
                
                                <div class="flex-1 ml-2">
                                    <div class="flex justify-between">
                                        <p class="mb-px">
                                            <b>
                                                {{$review->user->name}}
                                            </b>
                                            <i class="fas fa-star text-yellow-300"></i>
                                            {{$review->rating}}
                                        </p>
                                        <small class="mr-10">
                                            <i>
                                                @if ($review->created_at == $review->updated_at)
                                                    {{$review->created_at->diffForHumans()}}
                                                @else
                                                    {{$review->updated_at->diffForHumans()}} (Editado)
                                                @endif
                                            </i>
                                        </small>
                                    </div>
                                    {{$review->comment}}
                                    <header class="flex">
                                        <div class="flex space-x-2 items-center cursor-pointer pr-4">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 font-semibold"> 2</span>
                                        </div>  
                                       <div class="text-sm">
                                            <span title="Editar" wire:click="edit({{$review}})" class="text-gray-600 hover:text-blue-500 font-semibold cursor-pointer"><i class="fas fa-edit"></i> Editar</span>
                                            <span title="Eliminar" wire:click="destroy({{$review}})" class="text-gray-600 hover:text-red-500 font-semibold cursor-pointer"><i class="ml-2 fas fa-trash"></i> Eliminar</span>
                                       </div>
                                    </header>  
                                </div>
                            </div>   
                        @else
                            <div class="flex">
                                <figure>
                                    <img src="{{$review->user->profile_photo_url}}"
                                    title="{{$review->user->name}}"
                                    alt="{{$review->user->name}}"
                                    class="h-12 w-12 object-cover rounded-full shadow-lg">
                                </figure>
                
                                <div class="flex-1 ml-2">
                                    <div class="flex justify-between">
                                        <p class="mb-px">
                                            <b>
                                                {{$review->user->name}}
                                            </b>
                                            <i class="fas fa-star text-yellow-300"></i>
                                            {{$review->rating}}
                                        </p>
                                        <small class="mr-10">
                                            <i>
                                                @if ($review->created_at == $review->updated_at)
                                                    {{$review->created_at->diffForHumans()}}
                                                @else
                                                    {{$review->updated_at->diffForHumans()}} (Editado)
                                                @endif
                                            </i>
                                        </small>
                                    </div>
                                    {{$review->comment}}  
                                    <header class="flex">
                                        <div class="flex space-x-2 items-center cursor-pointer pr-4">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 font-semibold"> 2</span>
                                        </div>  
                                        <div class="justify-end text-sm">
                                            <span title="Ver Respuestas" class="text-blue-600 hover:text-blue-800 font-semibold cursor-pointer"><i class="fas fa-sort-down"></i> Ver respuestas</span>
                                            <span title="Responder" class="ml-2 text-gray-600 hover:text-blue-600 font-semibold cursor-pointer"> Responder</span>
                                        </div>
    
                                    </header>  
                                </div>
                            </div>
                        @endif

                    @else
                        <div class="flex">
                            <figure>
                                <img src="{{$review->user->profile_photo_url}}"
                                title="{{$review->user->name}}"
                                alt="{{$review->user->name}}"
                                class="h-12 w-12 object-cover rounded-full shadow-lg">
                            </figure>
            
                            <div class="flex-1 ml-2">
                                <div class="flex justify-between">
                                    <p class="mb-px">
                                        <b>
                                            {{$review->user->name}}
                                        </b>
                                        <i class="fas fa-star text-yellow-300"></i>
                                        {{$review->rating}}
                                    </p>
                                    <small class="mr-10">
                                        <i>
                                            @if ($review->created_at == $review->updated_at)
                                                {{$review->created_at->diffForHumans()}}
                                            @else
                                                {{$review->updated_at->diffForHumans()}} (Editado)
                                            @endif
                                        </i>
                                    </small>
                                </div>
                                {{$review->comment}}  
                                <header class="flex">
                                    <div class="flex space-x-2 items-center cursor-pointer pr-4">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="text-gray-600 font-semibold"> 2</span>
                                    </div>  
                                    <div class="justify-end text-sm">
                                        <span title="Ver Respuestas" class="text-blue-600 hover:text-blue-800 font-semibold cursor-pointer"><i class="fas fa-sort-down"></i> Ver respuestas</span>
                                        <span title="Responder" class="ml-2 text-gray-600 hover:text-blue-600 font-semibold cursor-pointer"> Responder</span>
                                    </div>
                                </header>
                            </div>
                        </div>
                    @endauth
                    
                @endif
            </article>
        @endforeach
    </div>
    @push('script')
    <script>
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
</section>

