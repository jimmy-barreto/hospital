@extends('layouts.layout')

@section('titulo')
    Ingreso de Nuevo Diagnostico
@endsection


@section('contenido')
<h1 class="text-center">Nuevo Diagnostico</h1>
<br><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <div class="header"> <strong>Ups. =)</strong>Algo anda mal...</div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
    </div>
@endif

<br><br>

        <form action="{{route('diagnostico.store')}} " method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Codigo del Diagnostico:</label>
                    <input type="text" class="form-control" name="codigo" placeholder="Codigo">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tipo:</label>
                    <input type="text" class="form-control" name="tipo" placeholder="Tipo">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Complicaciones:</label>
                    <input type="text" class="form-control" name="complicaciones" placeholder="Complicaciones">
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Crear Diagnostico</button>
            </div>

        </form>
        <br><br>
        <div class="row">
            <a href=" {{route('diagnostico.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection