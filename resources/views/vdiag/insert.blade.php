@extends('layouts.layout')

@section('titulo')
    Ingreso de Nuevo Resultado
@endsection


@section('contenido')
<h1 class="text-center">Nuevo Resultado</h1>
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

        <form action="{{route('vdiag.store')}} " method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha:</label>
                    <input type="date" class="form-control" name="fecha">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Paciente:</label>
                    <select name="idpaciente" class="form-control">
                        @foreach ($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Codigo del Diagnostico:</label>
                    <select name="iddiagnostico" class="form-control">
                        @foreach ($diagnosticos as $diagnostico)
                            <option value="{{$diagnostico->id}}">{{$diagnostico->codigo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Crear Resultado</button>
            </div>

        </form>
        <br><br>
        <div class="row">
            <a href=" {{route('vdiag.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection