@extends('adminlte::page')

@section('title', 'CRUD usuarios')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
   <a href="users/create" class="btn btn-primary mb-3">REGISTRAR</a>

<table id="users" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>


            <th scope="col">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->rol}}</td>


            <td>

                <form action="{{ route ('users.destroy',$user->id)}}" method="POST">
                <a href="/users/{{ $user->id}}/edit" class="btn btn-info">Editar</a>

                    @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#users').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ por pagina",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrar _PAGE_ paginas de _PAGES_",
            "infoEmpty": "No hay nada",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            "paginate":{
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
} );
</script>

@stop
