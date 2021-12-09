<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div class="text-gray-900 bg-gray-200 overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <div class="p-4 flex">
                <h1 class="text-3xl text-bold">
                    Asignacion de Roles
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <div class="flex flex-col p-8 bg-white rounded-xl shadow-lg hover:shadow-xl transform ">
                    <div class="form-control mb-2">
                        <p class="text-lg font-bold">Nombre:</p>
                        <p class="font-semibold text-gray-500">{{$user->name}}</p>
                    </div>
                    <h2 class="mb-2">Listado de Roles</h2>
                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                            <div>
                                <label for="">
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1 mb-2']) !!}
                                    {{$role->name}}
                                </label>
                            </div>
                        @endforeach
                        {!! Form::submit('Asignar Rol', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
                    {!! Form::close() !!}
                </div>
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
</x-app-layout>