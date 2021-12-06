<x-app-layout>
    {!! Form::open(['route' => 'admin.categories.store']) !!}
        <div class="container py-8">
            <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
                <h1 class="text-3xl text-center font-bold">Crea una categoría</h1>
                <div class="w-full mx-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <div class="mt-2">
                        @error('name')
                            {!! Form::label('name', 'Nombre', ['class' => 'block font-semibold text-base text-red-700']) !!}
                            {!! Form::text('name', null, ['class' => 'block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                                        'placeholder' => 'Ingrese un nombre',
                                                        'aria-describedby' => 'nombre',
                                                        'onload' => 'crearURLAmigable(this.value)', 'onkeyup' => 'crearURLAmigable(this.value)']) !!}
                            <small id="nombre" class="text-red-600 font-medium">{{$message}}</small>
                        @else
                            {!! Form::label('name', 'Nombre', ['class' => 'block font-semibold text-base text-gray-700']) !!}
                            {!! Form::text('name', null, ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                                        'placeholder' => 'Ingrese un nombre',
                                                        'aria-describedby' => 'nombre',
                                                        'onload' => 'crearURLAmigable(this.value)', 'onkeyup' => 'crearURLAmigable(this.value)']) !!}
                            <small id="nombre" class="text-gray-600 font-medium">
                                Ingrese el nombre de la categoría
                            </small>
                        @enderror
                    </div>

                    <div class="mt-3">
                        @error('slug')
                            {!! Form::label('slug', 'Slug', ['class' => 'block font-semibold text-base text-red-700']) !!}
                            {!! Form::text('slug', null, ['class' => 'block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                                        'placeholder' => 'Ingrese un Slug',
                                                        'aria-describedby' => 'url-amigable',
                                                        'readonly']) !!}
                            <small id="url-amigable" class="text-red-600 font-medium">
                                {{$message}}
                            </small>
                        @else
                            {!! Form::label('slug', 'Slug', ['class' => 'block font-semibold text-base text-gray-700']) !!}
                            {!! Form::text('slug', null, ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                                        'placeholder' => 'Ingrese un Slug',
                                                        'aria-describedby' => 'url-amigable',
                                                        'readonly']) !!}
                            <small id="url-amigable" class=" text-gray-600 font-medium">
                                El slug se generara automáticamente
                            </small>
                        @enderror

                    </div>
                    {!! Form::submit('Crear Categoría', ['class' => 'w-full mt-6 text-indigo-50 font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-500 transition duration-300']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    @push('script')
        <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
        <script type="text/javascript">
            function crearURLAmigable(slug){

                slug = slug.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                // Reemplaza los carácteres especiales | simbolos con un espacio
                slug = slug.replace(/[`´¡°¬~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

                // Corta los espacios al inicio y al final del sluging
                slug = slug.replace(/^\s+|\s+$/gm,'');

                // Reemplaza el espacio con guión
                slug = slug.replace(/\s+/g, '-');

                // Creo la URL en el campo de texto 'url'
                var input = document.getElementById('slug');
                input.value = slug;

            }
        </script>
    @endpush
</x-app-layout>
