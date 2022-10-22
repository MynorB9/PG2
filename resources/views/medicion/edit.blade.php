@extends('adminlte::page')

@section('title', 'CRUD mediciones')

@section('content_header')

    <h1>Editar medicion</h1>
@stop

@section('content')
    <form action="/mediciones/{{$medicion->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" value="{{$medicion->nombre}}">

            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Telefono</label>
                <input id="telefono" name="telefono" type="text" class="form-control" value="{{$medicion->telefono}}">
            </div>
            <div class="col-md-6 "mb-3">
                <label for="" class="form-label">Direccion</label>
                <input id="direccion" name="direccion" type="text" class="form-control"
                       value="{{$medicion->direccion}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="form-label">Descripcion</label>
                <input id="descripcion" name="descripcion" type="text" class="form-control"
                       value="{{$medicion->descripcion}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option {{($medicion->estado == 'Pendiente') ? 'selected' : ''}} value="Pendiente">Pendiente
                    </option>
                    <option {{($medicion->estado == 'Medido') ? 'selected' : ''}} value="Medido">Medido</option>
                    <option {{($medicion->estado == 'Cotizado') ? 'selected' : ''}} value="Cotizado">Cotizado</option>
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="" class="form-label">Detalle Trabajo</label>
                <textarea id="detalleTrabajo" name="detalleTrabajo"
                          class="form-control"> {{$medicion->detalleTrabajo}} </textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" class="form-control" value="{{$medicion->precio}}">
            </div>
            <div class="col-md-6 mt-4">
                <a href="/mediciones" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    <form action="{{route('imagen.store', $medicion->id)}}"
          class="dropzone"
          id="my-awesome-dropzone">
        @csrf

    </form>
@stop

@section('css')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@stop
