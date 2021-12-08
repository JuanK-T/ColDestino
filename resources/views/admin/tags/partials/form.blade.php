<div>
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

    <div class="mt-3">
        @error('color')
            {!! Form::label('color', 'Color', 
            ['class' => 'block font-semibold text-base text-red-700']) !!}
            {!! Form::select('color', $colors, null, 
            ['class' => 'block mt-1 w-full border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm',
                    'aria-describedby' => 'colors']) !!}
            <small id="colors" class=" text-red-600 font-medium">
                {{$message}}
            </small>
        @else
            {!! Form::label('color', 'Color', 
            ['class' => 'block font-semibold text-base text-gray-700']) !!}
            {!! Form::select('color', $colors, null, 
            ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                    'aria-describedby' => 'colors']) !!}
            <small id="colors" class=" text-gray-600 font-medium">
                Selecciona una categoría
            </small>
        @enderror    
    </div>

    <div class="mt-3 px-0 md:px-5 grid grid-cols-1 md:grid-cols-2 gap-2">
        <div class="image-wrapper">
            @isset ($tag->image)
                <img id="picture" src="{{Storage::url($tag->image->url)}}" alt="Imagen de {{$tag->name}}" title="Imagen de {{$tag->name}}">

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
                   Sube una imagen para mostrar
                </p>
            @enderror
        </div>
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


