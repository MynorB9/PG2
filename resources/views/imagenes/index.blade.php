@extends('adminlte::page')

@section('title', 'Imagenes Mediciones')

@section('content_header')
    <h1>Imagenes Medicion</h1>
@stop

@section('content')
    <div class="row">
        @foreach($imagenes as $img)
            <div class="col-md-6">
                <img width="500" class="img-fluid" src="data:image/jpeg;base64,{{$img->imagen}}" alt="Medicion">
            </div>
        @endforeach
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
@stop
