@extends('adminlte::page')

@section('title', 'CRUD Confirmar trabajos')

@section('content_header')
    <h1>Lista de Trabajos</h1>
@stop

@section('content')
<h3>Cotizados/Elaborando</h3>
<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Fotos</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Detalle</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $medicion)

            <tr>
                <td><a class="btn btn-primary" href="{{route('imagen.view', $medicion->id)}}"><i class="far fa-images"></i></a></td>
                <td>{{strtoupper($medicion->nombre)}}</td>
                <td>{{$medicion->telefono}}</td>
                <td>{{$medicion->direccion}}</td>
                <td>{{$medicion->descripcion}}</td>
                <td>{{$medicion->precio}}</td>
                <td>
                    @if($medicion->estado == 'Cotizado')
                        <span class="badge badge-primary w-100">{{$medicion->estado}}</span>
                    @elseif($medicion->estado == 'Confirmado')
                        <span class="badge badge-secondary  w-100">{{$medicion->estado}}</span>
                    @elseif($medicion->estado == 'Instalado Pendiente Pago')
                        <span class="badge badge-info  w-100">{{$medicion->estado}}</span>
                    @elseif($medicion->estado == 'Cancelado')
                        <span class="badge badge-danger  w-100">{{$medicion->estado}}</span>
                    @endif
                </td>
                <td nowrap>
                    @if($medicion->estado == 'Cotizado')
                        <button type="button" onclick="confirmarMedicion({{ $medicion->id}}, 'Confirmado')" class="btn btn-info btn-sm btn-block">Confirmar</button>
                    @elseif($medicion->estado == 'Confirmado')
                        <button type="button" onclick="confirmarMedicion({{ $medicion->id}}, 'Instalado Pendiente Pago')" class="btn btn-primary btn-sm btn-block">Pendiente Pago</button>
                    @elseif($medicion->estado == 'Instalado Pendiente Pago')
                        <button type="button" onclick="confirmarMedicion({{ $medicion->id}}, 'Cancelado')" class="btn btn-danger btn-sm btn-block">Realizar Pago</button>
                    @endif
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
        Swal.fire({
            title: 'Desea cambiar el estado de la medicion ID: ' + id + ' a estado: ' + estado,
            showDenyButton: true,
            confirmButtonText: 'Aceptar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = "/medicion/confirmar/" +id + "/" +estado;
            } else if (result.isDenied) {

            }
        })
    }
</script>

<script>
$(document).ready(function() {
    $('#articulos').DataTable({

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
