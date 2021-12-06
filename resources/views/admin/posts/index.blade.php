<x-app-layout>
    <div class="container py-8">
        <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <div class="p-4 flex">
                <h1 class="text-3xl font-bold">
                    Lista de Publicaciones
                </h1>
            </div>
            <div class="my-4">
                <a href="{{route('admin.posts.create')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">
                    Agregar Publicación
                </a>
            </div>
            @livewire('admin.post-index')
        </div>
    </div>
</x-app-layout>
