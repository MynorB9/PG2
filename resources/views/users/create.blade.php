@extends('adminlte::page')

@section('title', 'crear usuarios')

@section('content_header')
   <h1>Registrar Usuario</h1>
@stop

@section('content')

<form action="/users" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input id="password" name="password" type="password" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Rol</label>
        <input id="rol" name="rol" type="text" class="form-control" tabindex="2">
    </div>

  <a href="/users" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
