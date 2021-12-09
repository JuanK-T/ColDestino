<div class="mx-4">
    <div class="mb-4">
        @error('name')
            <small class="text-red-500">
                {{$message}}
            </small>
        @enderror
        {!! Form::label('name', 'Nombre', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) !!}
        <div class="flex bg-gray-100 p-1 w-full space-x-2 rounded-lg mr-10">
            {!! Form::text('name', null, ['class' => 'bg-gray-100 w-full outline-none hover:scale-105 transition duration-500', 'placeholder' => 'Nombre']) !!}
        </div>
    </div>
    
    <div class="mb-4">
        <h2 class="text-lg text-bold">Lista de Permisos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-10">
            @foreach ($permissions as $permission)
                <div class="ml-3">
                    <label for="">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>


@if(session('info'))
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: '{{session("info")}}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif