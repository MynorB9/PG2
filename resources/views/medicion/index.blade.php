@extends('adminlte::page')

@section('title', 'CRUD Mediciones')

@section('content_header')
    <h1>Listado de Mediciones</h1>
@stop

@section('content')
   <a href="mediciones/create" class="btn btn-primary mb-3">CREAR</a>

<table id="mediciones" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Fotos</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Medidor</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mediciones as $medicion)
        <tr>
            <td><a class="btn btn-primary" href="{{route('imagen.view', $medicion->id)}}"><i class="far fa-images"></i></a></td>
            <td>{{strtoupper($medicion->nombre)}}</td>
            <td>{{$medicion->telefono}}</td>
            <td>{{strtoupper($medicion->direccion)}}</td>
            <td>{{strtoupper($medicion->descripcion)}}</td>
            <td>{{strtoupper($medicion->id_user)}}</td>
            <td>
                @if($medicion->estado == 'Pendiente')
                    <span class="badge badge-primary w-100">{{$medicion->estado}}</span>
                @elseif($medicion->estado == 'Medido')
                    <span class="badge badge-secondary w-100">{{$medicion->estado}}</span>
                @else
                    <span class="badge badge-danger w-100">{{$medicion->estado}}</span>
                @endif
            </td>
            <td>{{strtoupper($medicion->fecha)}}</td>

            <td>
                <form action="{{ route ('mediciones.destroy',$medicion->id)}}" method="POST">
                <a href="/mediciones/{{ $medicion->id}}/edit" class="btn btn-info">Completar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
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
    $('#mediciones').DataTable({
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
