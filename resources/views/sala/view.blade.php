@extends('layouts.layout')

@section('titulo')
    Detalle del Sala
@endsection

@section('contenido')
    <h1 class="text-center" >Detalle del sala</h1>
    <br><br>

    <div class="row">
        <div class="col-sm-3">
            <h3>Codigo: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$sala->codigo}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$sala->nombre}}</p>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Cantidad de Camas: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$sala->cantidadCamas}}</p>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Hospital donde esta la Sala: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$sala->hospital}}</p>
        </div>
    </div>
<br><br>

<div class="row">
    <a href="{{route('sala.index')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection