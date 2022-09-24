@extends('adminlte::page')

@section('title', 'CRUD Mediciones')

@section('content_header')
    <h1>Editar Medicion</h1>
@stop

@section('content')
   <form action="/mediciones/{{$medicion->id}}" method="POST">
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$medicion->nombre}}">
  </div>
       <div class="mb-3">
           <label for="" class="form-label">Telefono</label>
           <input id="telefono" name="telefono" type="text" class="form-control" value="{{$medicion->telefono}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Direccion</label>
           <input id="direccion" name="direccion" type="text" class="form-control" value="{{$medicion->direccion}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Descripcion</label>
           <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$medicion->descripcion}}">
       </div>
       <div class="mb-3">
           <label for="estado">Estado</label>
           <select name="estado" id="estado" class="form-control">
               <option value="Pendiente">Pendiente</option>
               <option value="Medido">Medido</option>
               <option value="Cotizado">Cotizado</option>
           </select>
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Detalle Trabajo</label>
           <textarea id="detalleTrabajo" name="detalleTrabajo" class="form-control" > {{$medicion->detalleTrabajo}} </textarea>
       </div>
       <div class="mb-3">
           <label for="precio" class="form-label">Precio</label>
           <input id="precio" name="precio" type="number" class="form-control" value="{{$medicion->precio}}">
       </div>
  <a href="/mediciones" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
