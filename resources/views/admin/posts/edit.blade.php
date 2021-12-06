<x-post-layout :post="$post">

    <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
        <h1 class="text-3xl text-center font-bold">Actualizar Post</h1>
        {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' =>  'put', 'class' => 'formulario-guardar']) !!}
            <div class="min-w-full mx-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @include('admin.posts.partials.form')
                {!! Form::submit('Actualizar Post', ['class' => 'w-full mt-6 text-indigo-50 font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-500 transition duration-300']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/admin/posts/form.js')}}"></script>
    </x-slot>
</x-post-layout>
