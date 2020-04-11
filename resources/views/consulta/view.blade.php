@extends('layouts.layout')

@section('titulo')
Consulta
@endsection

@section('contenido')
    <h1 class="text-center" >Consulta</h1>
    <br><br>

    <div class="row"></div>
    
    <div class="row">
        <div class="col-sm-3">
            <h3>Fecha de la Consulta: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$consulta->fecha}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Medico que lo atendio: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$consulta->medico}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Paciente: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$consulta->paciente}}</p>
        </div>
    </div>
    <br><br>

<div class="row">
    <a href="{{route('consulta.index')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection