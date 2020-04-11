@extends('layouts.layout')

@section('titulo', 'Modificar Resultado')

@section('contenido')
<h1 class="text-center">Modificar Resultado</h1>
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

        <form action="{{route('vdiag.update', $vdiag->id)}} " method="post">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha del Resultado:</label>
                    <input type="date" class="form-control" name="fecha" value="{{$vdiag->fecha}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Paciente:</label>
                    <select name="idpaciente" class="form-control">
                        @foreach ($pacientes as $paciente)
                            <option value="{{$paciente->id}}"
                                @if ($vdiag->idpaciente == $paciente->id)
                                    selected                                    
                                @endif>
                                
                            {{$paciente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Codigo del Diagnostico:</label>
                    <select name="iddiagnostico" class="form-control">
                        @foreach ($diagnosticos as $diagnostico)
                            <option value="{{$diagnostico->id}}"
                                @if ($vdiag->iddiagnostico == $diagnostico->id)
                                    selected                                    
                                @endif>
                                
                            {{$diagnostico->codigo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Modificar Resultado</button>
            </div>

        </form>

        <br><br>
        <div class="row">
            <a href=" {{route('vdiag.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection