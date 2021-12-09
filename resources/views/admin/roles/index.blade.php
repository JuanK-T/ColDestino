<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Asignación de Roles
                </h1>
            </div>

            <div class="my-4">
                <a href="{{route('admin.roles.create')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">
                    Agregar Roles
                </a>
            </div>

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
                        @foreach ($roles as $role)
                            <tr class="border-b hover:bg-orange-100">
                                <td class="p-3 px-5">{{$role->id}}</td>
                                <td class="p-3 px-5">{{$role->name}}</td>
                                <td class="p-3 px-5 flex justify-start">
                                        <a href="{{route('admin.roles.edit', $role)}}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</a>
                                    <form class="formulario-eliminar" action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>