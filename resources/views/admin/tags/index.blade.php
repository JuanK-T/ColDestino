<x-app-layout>
	<div class="container py-8">
        <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <div class="p-4 flex">
                <h1 class="text-3xl font-bold">
                    Lista de Etiquetas
                </h1>
            </div>

            @can('admin.tags.create')
            <div class="my-4">
                <a href="{{route('admin.tags.create')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3"> 
                    Agregar Etiquetas
                </a>
            </div>
            @endcan

           	<table class="min-w-full text-lg shadow-md rounded divide-y divide-gray-200">
	            <thead class="bg-gray-50">
	                <tr>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                        Nombre
	                    </th>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                        Post Relacionados
	                    </th>
	                    <th scope="col" class="relative px-6 py-3">
                        	<span class="sr-only">Edit</span>
                    	</th>
	                </tr>
	            </thead>
	            <tbody class="w-full bg-white divide-y divide-gray-200">
	                @foreach ($tags as $tag)
	                    <tr>
	                        <td class="px-6 py-4 whitespace-nowrap">
	                            <div class="flex items-center">
	                                <div class="flex-shrink-0 h-10 w-10">
	                                    @if ($tag->image)
	                                        <img class="h-10 w-10 rounded-full" 
	                                        src="{{Storage::url($tag->image->url)}}" 
	                                        alt="{{$tag->name}}" title="{{$tag->name}}">
	                                    @else
	                                        <img class="h-10 w-10 rounded-full" 
	                                        src="https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg" 
	                                        alt="{{$tag->name}}" title="{{$tag->name}}">
	                                    @endif
	                                </div>
	                                <div class="ml-4">
	                                    <a title="Ver el post" href="{{route('posts.tag', $tag)}}" class="cursor-pointer text-base font-semibold text-gray-900">
	                                         {{$tag->name}}
	                                    </a>
	                                </div>
	                            </div>
	                        </td>
	                        <td class="px-6 py-4 whitespace-nowrap flex">
	                            <div class="text-sm text-gray-900">{{$tag->post_count}}</div>
	                            <div class="ml-1 text-sm text-gray-500">Post</div>
	                        </td>
	                        
	                        <td class="whitespace-nowrap text-center text-lg font-medium">
	                        	<div class="flex">
		                        	@can('admin.tags.edit')
		                        	<a title="Editar" href="{{route('admin.tags.edit', $tag)}}" class="mr-3 bg-blue-500 hover:bg-blue-700 text-white px-3 py-2 rounded-full focus:outline-none focus:shadow-outline">
	                                	<i class="fas fa-edit"></i>
	                            	</a>
		                        	@endcan
	                            	@can('admin.tags.destroy')
	                            	<form class="formulario-eliminar" action="{{route('admin.tags.destroy', $tag)}}" method="POST">
		                                @csrf
		                                @method('delete')
		                                <button title="Eliminar" type="submit" class=" bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-full focus:outline-none focus:shadow-outline">
		                                    <i class="fas fa-trash-alt"></i>
		                                </button>
		                            </form>
	                            	@endcan
	                        	</div>
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
        	</table>
        </div>
    </div>

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
</x-app-layout>