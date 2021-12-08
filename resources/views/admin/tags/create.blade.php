<x-app-layout>
	{!! Form::open(['route' => 'admin.tags.store', 'files' => true]) !!}
        <div class="container py-8">
            <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
                <h1 class="text-3xl text-center font-bold">Crea una Etiqueta</h1>
                <div class="w-full mx-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    @include('admin.tags.partials.form')
                    {!! Form::submit('Crear Etiqueta', ['class' => 'w-full mt-6 text-indigo-50 font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-500 transition duration-300']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/admin/posts/form.js')}}"></script>
    </x-slot>
</x-app-layout>