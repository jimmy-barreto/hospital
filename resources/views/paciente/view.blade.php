@extends('layouts.layout')

@section('titulo')
    Detalle del Paciente
@endsection

@section('contenido')
    <h1 class="text-center" >Detalle del Paciente</h1>
    <br><br>

    <div class="row">
        <div class="col-sm-3">
            <h3>Cedula: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->cedula}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->nombre}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Direccion: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->direccion}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Fecha de Nacimiento: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->fechaNacimiento}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Genero: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->genero}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Numero de Registro: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->numeroRegistro}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Numero de Cama: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->numeroCama}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <h3>Sala donde esta el Paciente: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$paciente->sala}}</p>
        </div>
    </div>

<br><br>

<div class="row">
    <a href="{{route('paciente.index')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection