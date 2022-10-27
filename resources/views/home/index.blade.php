@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
    <h1>Escritorio</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="small-box bg-gradient-warning">
            <div class="inner">
                <h3>{{$pendientes}}</h3>
                <p>Trabajos Pendientes</p>
            </div>
            <div class="icon">
                <i class="far fa-clock"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-gradient-blue">
            <div class="inner">
                <h3>{{$medidos}}</h3>
                <p>Trabajos Medidos</p>
            </div>
            <div class="icon">
                <i class="fas fa-ruler-combined"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{$cotizados}}</h3>
                <p>Trabajos Cotizados</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="small-box bg-gradient-info">
            <div class="inner">
                <h3>{{$confirmados}}</h3>
                <p>Trabajos Confirmados</p>
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-check"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-gradient-danger">
            <div class="inner">
                <h3>{{$pendientePago}}</h3>
                <p>Pendiente Pago</p>
            </div>
            <div class="icon">
                <i class="fas fa-search-dollar"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{$cancelados}}</h3>
                <p>Trabajos Terminados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>
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
