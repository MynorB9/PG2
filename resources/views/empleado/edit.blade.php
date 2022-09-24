@extends('adminlte::page')

@section('title', 'CRUD empleado')

@section('content_header')
    <h1>Editar empleado</h1>
@stop

@section('content')
   <form action="/empleados/{{$empleado->id}}" method="POST">
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$empleado->nombre}}">
  </div>
       <div class="mb-3">
           <label for="" class="form-label">Telefono</label>
           <input id="telefono" name="telefono" type="text" class="form-control" value="{{$empleado->telefono}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Direccion</label>
           <input id="direccion" name="direccion" type="text" class="form-control" value="{{$empleado->direccion}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Puesto</label>
           <input id="puesto" name="puesto" type="text" class="form-control" value="{{$empleado->puesto}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Sueldo</label>
           <input id="sueldo" name="sueldo" type="text" class="form-control" value="{{$empleado->sueldo}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Imagen</label>
           <input id="imagen" name="imagen" type="file" class="form-control" >
       </div>

  <a href="/empleados" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
