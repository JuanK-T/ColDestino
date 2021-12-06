<div>
    
    <div class="mt-2">
        @error('name')
            {!! Form::label('name', 'Nombre', ['class' => 'block font-semibold text-base text-red-700']) !!}
            {!! Form::text('name', null, ['class' => 'block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                        'placeholder' => 'Ingrese el título',
                                        'aria-describedby' => 'nombre',
                                        'onload' => 'crearURLAmigable(this.value)', 'onkeyup' => 'crearURLAmigable(this.value)']) !!}
            <small id="nombre" class="text-red-600 font-medium">{{$message}}</small>
        @else
            {!! Form::label('name', 'Nombre', ['class' => 'block font-semibold text-base text-gray-700']) !!}
            {!! Form::text('name', null, ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                        'placeholder' => 'Ingrese el título',
                                        'aria-describedby' => 'nombre',
                                        'onload' => 'crearURLAmigable(this.value)', 'onkeyup' => 'crearURLAmigable(this.value)']) !!}
            <small id="nombre" class="text-gray-600 font-medium">
                Ingrese el título de tu post
            </small>
        @enderror
    </div>

    <div class="mt-3">
        @error('slug')
            {!! Form::label('slug', 'Slug', ['class' => 'block font-semibold text-base text-red-700']) !!}
            {!! Form::text('slug', null, ['class' => 'block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                        'placeholder' => 'Ingrese un Slug',
                                        'aria-describedby' => 'url-amigable',
                                        'readonly',
                                        ]) !!}
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

    <div class="mt-3">
        @error('category_id')
            {!! Form::label('category_id', 'Categoría', 
            ['class' => 'block font-semibold text-base text-red-700']) !!}
            {!! Form::select('category_id', $categories, null, 
            ['class' => 'block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm',
                    'aria-describedby' => 'categoria']) !!}
            <small id="categoria" class=" text-red-600 font-medium">
                {{$message}}
            </small>
        @else
            {!! Form::label('category_id', 'Categoría', 
            ['class' => 'block font-semibold text-base text-gray-700']) !!}
            {!! Form::select('category_id', $categories, null, 
            ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                    'aria-describedby' => 'categoria']) !!}
            <small id="categoria" class=" text-gray-600 font-medium">
                Selecciona una categoría
            </small>
        @enderror
        
    </div>

    <div class="mt-3">
        @error('tags')
            <p class="block font-semibold text-base text-red-700 mb-2">Etiquetas</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">    
                @foreach ($tags as $tag)
                    <label for="" class="mr-2 text-base">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{$tag->name}}
                    </label>
                @endforeach
            </div>
            <small id="etiqueta" class=" text-red-600 font-medium">
                {{$message}}
            </small>
        @else
            <p class="block font-semibold text-base text-gray-700 mb-2">Etiquetas</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">    
                @foreach ($tags as $tag)
                    <label for="" class="mr-2 text-base">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{$tag->name}}
                    </label>
                @endforeach
            </div>
            <small id="etiqueta" class=" text-gray-600 font-medium">
                Escoge las etiquetas que desees
            </small>
        @enderror
    </div>

    <div class="mt-3">
        <p class="fond-bold">Estado</p>
        <label for="">
            {!! Form::radio('status', 1, true) !!}
            Borrador
        </label>
        <label for="">
            {!! Form::radio('status', 2) !!}
            Revisión
        </label>
        <label for="">
            {!! Form::radio('status', 3) !!}
            Publicado
        </label>
    </div>
    
    {{-- Imagen --}}
    <div class="mt-3 px-0 md:px-5 grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="Imagen de {{$post->name}}" title="Imagen de {{$post->name}}">

            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/08/14/04/20/background-1592030__340.jpg" alt="Imagen por defecto" title="Imagen por defecto">
            @endisset
        </div>
        <div>
            @error('file')
                {!! Form::label('file', 'Imagen que se mostrara', ['class' => 'block font-semibold text-base text-red-700']) !!}
                {!! Form::file('file', ['accept' => 'image/*', 'class' => 'block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm'
                    ]) !!}
                <p class="mt-2 text-red-600 font-medium">
                    {{$message}}
                </p>
            @else
                {!! Form::label('file', 'Imagen que se mostrara', ['class' => 'block font-semibold text-base text-gray-700']) !!}
                {!! Form::file('file', ['accept' => 'image/*', 'class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'
                    ]) !!}
                <p class="mt-2">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique minima quo aspernatur veniam quam natus fugit, voluptas expedita voluptatibus enim in perspiciatis laudantium, laboriosam at adipisci sint laborum minus repellendus.
                </p>
            @enderror
        </div>
    </div>

    <div class="mt-3">
        @error('extract')
            {!! Form::label('extract', 'Descripcion', ['class' => 'block font-semibold text-base text-red-700']) !!}
            <div class="block p-px w-full bg-red-300 focus:bg-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm">
                {!! Form::textarea('extract', null, ['class' => 'block mt-1 w-full rounded-md shadow-sm'
                            , 'aria-describedby' => 'descripcion']) !!}
            </div>
            <small id="etiqueta" class=" text-red-600 font-medium">
                {{$message}}
            </small>
        @else
            {!! Form::label('extract', 'Descripcion', ['class' => 'block font-semibold text-base text-gray-700']) !!}
            {!! Form::textarea('extract', null, ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'
                        , 'aria-describedby' => 'descripcion']) !!}
            <small id="etiqueta" class=" text-gray-600 font-medium">
                Ingresa un pequeño resumen de tu post
            </small>
        @enderror       
    </div>

    <div class="mt-3">
        @error('body')
            {!! Form::label('body', 'Contenido Principal', ['class' => 'block font-semibold text-base text-red-700']) !!}
            <div class="block p-px w-full bg-red-300 focus:bg-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm">
                {!! Form::textarea('body', null, ['class' => 'block mt-1 w-full rounded-md shadow-sm'
                        , 'aria-describedby' => 'contenidoPrincipal']) !!}
            </div>
            <small id="contenidoPrincipal" class=" text-red-600 font-medium">
                {{$message}}
            </small>
        @else
            {!! Form::label('body', 'Contenido Principal', ['class' => 'block font-semibold text-base text-gray-700']) !!}
            {!! Form::textarea('body', null, ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'
                        , 'aria-describedby' => 'contenidoPrincipal']) !!}
            <small id="contenidoPrincipal" class=" text-gray-600 font-medium">
                Escribe de lo que más te gusta
            </small>
        @enderror
        
    </div>

    @if(session('info'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{session("info")}}',
                showConfirmButton: false,
                timer: 1800
            })
        </script>
    @endif
</div>