@extends('adminlte::page')

@section('title', 'CANCELADOS')

@section('content_header')
    <h1>Lista de Trabajos Cancelados</h1>
@stop

@section('content')
<hr>
<h3>Cancelados</h3>
<table id="cancelados" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>
        <th scope="col">Direccion</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Detalle Trabajo</th>
        <th scope="col">Precio</th>
        <th scope="col">Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($cancelados as $medicion)

        <tr>
            <td>{{ $medicion->id}}</td>
            <td>{{$medicion->nombre}}</td>
            <td>{{$medicion->telefono}}</td>
            <td>{{$medicion->direccion}}</td>
            <td>{{$medicion->descripcion}}</td>
            <td>{{$medicion->detalleTrabajo}}</td>
            <td>{{$medicion->precio}}</td>
            <td>
                <span class="badge badge-danger" style="background-color: #1e0db4">{{$medicion->estado}}</span>
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
        $('#cancelados').DataTable({
            "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "Todos"]],
            "oLanguage": {

                "sSearch": "Buscar:"

            }
        });
    } );
</script>

@stop
