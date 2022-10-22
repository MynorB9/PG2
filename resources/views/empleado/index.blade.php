@extends('adminlte::page')

@section('title', 'CRUD empleados')

@section('content_header')
    <h1>Listado de empleados</h1>
@stop

@section('content')
   <a href="empleados/create" class="btn btn-primary mb-3">CREAR</a>

<table id="empleados" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Puesto</th>
            <th scope="col">Sueldo</th>
            <th scope="col">Imagen</th>
            <th scope="col">Saldo</th>

            <th scope="col">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->telefono}}</td>
            <td>{{$empleado->direccion}}</td>
            <td>{{$empleado->puesto}}</td>
            <td>{{$empleado->sueldo}}</td>
            <td><img width="50" class="img-fluid" src="data:image/jpeg;base64,{{($empleado->imagen)}}" alt="{{$empleado->nombre}}"></td>
            <td>{{$empleado->saldo}}</td>

            <td>

                <form action="{{ route ('empleados.destroy',$empleado->id)}}" method="POST">
                <a href="/empleados/{{ $empleado->id}}/edit" class="btn btn-info">Editar</a>

                    @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>

                </form>
                <button type="submit" class="btn btn-info">Adelanto</button>

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
    $('#empleados').DataTable({
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
