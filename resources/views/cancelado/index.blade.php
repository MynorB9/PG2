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
        <th scope="col">FECHA</th>
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
            <td>{{$medicion->fecha}}</td>
            <td>{{strtoupper($medicion->nombre)}}</td>
            <td>{{$medicion->telefono}}</td>
            <td>{{strtoupper($medicion->direccion)}}</td>
            <td>{{$medicion->descripcion}}</td>
            <td>{{$medicion->detalleTrabajo}}</td>
            <td>{{$medicion->precio}}</td>
            <td>
                <span class="badge badge-danger w-100" style="background-color: #1e0db4">{{$medicion->estado}}</span>
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
