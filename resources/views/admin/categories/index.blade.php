<x-app-layout>
    <div class="container py-8">
        <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <div class="p-4 flex">
                <h1 class="text-3xl font-bold">
                    Lista de Categorías
                </h1>
            </div>

            @can('admin.categories.create')
                <div class="my-4">
                    <a href="{{route('admin.categories.create')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">
                        Agregar Categoría
                    </a>
                </div>
            @endcan

            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-lg bg-white shadow-md rounded mb-4 table-fixed">
                    <thead>
                        <tr class="border-b bg-indigo-600 text-white">
                            <th class="text-left p-3 px-5">Id</th>
                            <th class="text-left p-3 px-5">Nombre</th>
                            <th class="text-left p-3 px-5">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b hover:bg-orange-100">
                                <td class="p-3 px-5">{{$category->id}}</td>
                                <td class="p-3 px-5">{{$category->name}}</td>
                                <td class="p-3 px-5 flex justify-start">
                                    @can('admin.categories.edit')
                                        <button type="button" class="mr-3 text-base bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{route('admin.categories.edit', $category)}}">Editar</a>
                                    </button>
                                    @endcan

                                    @can('admin.categories.destroy')
                                        <form class="formulario-eliminar" action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-base bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
