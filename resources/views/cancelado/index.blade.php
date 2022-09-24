@extends('adminlte::page')

@section('title', 'CRUD Confirmar trabajos')

@section('content_header')
    <h1>Lista de Trabajos</h1>
@stop

@section('content')
<h3>Cotizados</h3>
<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Detalle Trabajo</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $medicion)

            <tr>
                <td>{{$medicion->nombre}}</td>
                <td>{{$medicion->telefono}}</td>
                <td>{{$medicion->direccion}}</td>
                <td>{{$medicion->detalleTrabajo}}</td>
                <td>{{$medicion->precio}}</td>
                <td>
                    @if($medicion->estado == 'Cotizado')
                        <span class="badge badge-primary">{{$medicion->estado}}</span>
                    @elseif($medicion->estado == 'Confirmado')
                        <span class="badge badge-secondary">{{$medicion->estado}}</span>
                    @elseif($medicion->estado == 'Instalado Pendiente Pago')
                        <span class="badge badge-info">{{$medicion->estado}}</span>
                    @elseif($medicion->estado == 'Cancelado')
                        <span class="badge badge-danger">{{$medicion->estado}}</span>
                    @endif
                </td>
                <td nowrap>
                    @if($medicion->estado == 'Cotizado')
                        <button type="button" onclick="confirmarMedicion({{ $medicion->id}}, 'Confirmado')" class="btn btn-info btn-sm">Confirmar</button>
                    @elseif($medicion->estado == 'Confirmado')
                        <button type="button" onclick="confirmarMedicion({{ $medicion->id}}, 'Instalado Pendiente Pago')" class="btn btn-primary btn-sm">Pendiente Pago</button>
                    @elseif($medicion->estado == 'Instalado Pendiente Pago')
                        <button type="button" onclick="confirmarMedicion({{ $medicion->id}}, 'Cancelado')" class="btn btn-danger btn-sm">Cancelado</button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

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
    function confirmarMedicion(id, estado){
        let confirmarAlert = confirm('Desea cambiar el estado de la medicion ID: ' + id + ' a estado: ' + estado);
        if(confirmarAlert){
            window.location.href = "/medicion/confirmar/" +id + "/" +estado;
        }
    }
</script>

<script>
$(document).ready(function() {
    $('#articulos').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
    $('#confirmados').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });

    $('#pendientePago').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
    $('#cancelados').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
