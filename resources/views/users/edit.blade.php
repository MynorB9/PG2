@extends('adminlte::page')

@section('title', 'CRUD Usuarios')

@section('content_header')
    <h1>Editar Usuarios</h1>
@stop

@section('content')
   <form action="/users/{{$user->id}}" method="POST">
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
  </div>
       <div class="mb-3">
           <label for="" class="form-label">Email</label>
           <input id="email" name="email" type="email" class="form-control" value="{{$user->email}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Password</label>
           <input id="password" name="password" type="password" class="form-control" value="{{$user->password}}">
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Rol</label>
           <input id="rol" name="rol" type="text" class="form-control" value="{{$user->rol}}">


  <a href="/users" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
