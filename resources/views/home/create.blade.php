@extends('adminlte::page')

@section('title', 'crear mediciones')

@section('content_header')
   <h1>Crear Medicion</h1>
@stop

@section('content')

<form action="/mediciones" method="POST">
  @csrf
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2">
  </div>
    <div class="col-md-6 mb-3">
        <label for="" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="2">
    </div>
    <div class="col-md-6 mb-3">
        <label for="" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="2">
    </div>
    <div class="col-md-6 mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2">
    </div>
</div>
  <a href="/mediciones" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@stop

@section('css')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@stop
