<x-table-responsive>
    <div class="px-6 py-4 bg-gray-300">
        <input
        wire:keydown="limpiar_page"
        wire:model="search"
        type="text"
        class="min-w-full border-2 bg-white h-10 w-96 pl-2 pr-8 text-sm focus:outline-none block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        placeholder="Ingrese el nombre de un post">
    </div>

    @if ($posts->count())
        <table class="min-w-full text-lg shadow-md rounded divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vistas
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificación
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        status
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($post->image)
                                        <img class="h-10 w-10 rounded-full" 
                                        src="{{Storage::url($post->image->url)}}" 
                                        alt="{{$post->name}}" title="{{$post->name}}">
                                    @else
                                        <img class="h-10 w-10 rounded-full" 
                                        src="https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg" 
                                        alt="{{$post->name}}" title="{{$post->name}}">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    @switch($post->status)
                                        @case(3)
                                            <a title="Ver el post" href="{{route('posts.show', $post)}}" class="cursor-pointer text-base font-semibold text-gray-900">
                                                {{Str::limit($post->name, 30)}}
                                            </a>
                                        @break

                                        @default
                                            <div class="text-base font-semibold text-gray-900">
                                                {{Str::limit($post->name, 30)}}
                                            </div>
                                    @endswitch
                                    <div class="text-sm text-gray-500">
                                        {{$post->category->name}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex">
                            <div class="text-sm text-gray-900">{{$post->visits->count()}}</div>
                            <div class="ml-1 text-sm text-gray-500">vistas</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 flex items-center">
                                <ul class="flex text-sm mr-1">
                                    <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$post->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                                </ul>
                                <div class="font-medium">
                                    ({{$post->rating}})
                                </div>
                            </div>
                            <div class="text-sm text-gray-500">Valoración</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @switch($post->status)
                                @case(1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Borrador
                                    </span>
                                @break

                                @case(2)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Revisión
                                    </span>
                                @break

                                @case(3)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Publicado
                                    </span>
                                @break

                                @default
                            @endswitch

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-lg font-medium flex">
                            <a title="Editar" href="{{route('admin.posts.edit', $post)}}" class="mr-3 bg-blue-500 hover:bg-blue-700 text-white px-3 py-2 rounded-full focus:outline-none focus:shadow-outline">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form class="formulario-eliminar" action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button title="Eliminar" type="submit" class=" bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-full focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{$posts->links()}}
        </div>
    @else
        <div class="min-w-full bg-white font-extrabold text-base text-center">No hay ningun registro que coincida</div>
    @endif

    @push('script')
        @if(session('eliminar') == 'ok')
            <script>
                Swal.fire(
                    '¡Registro Eliminado!',
                    'Su registro se ha eliminado',
                    'success'
                )
            </script>
        @endif
        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault()
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
                        this.submit();
                    }
                })
            })
        </script>
    @endpush
</x-table-responsive>

