<x-app-layout>
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
            <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
                <div class="p-4 flex">
                    <h1 class="text-3xl text-bold">
                        Formulario para la creación de Permisos
                    </h1>
                </div>
                <div class="px-3 py-4 flex justify-center w-full">
                    <div class="flex flex-col p-8 bg-white rounded-xl">
                        {!! Form::open(['route' => 'admin.roles.store', 'autocomplete' => 'off']) !!}
                            {{-- Input Oculto de IdUsuario --}}
                            @include('admin.roles.partials.form')

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                {!! Form::submit('Crear', ['class' => 'inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5']) !!}
                            </span>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>