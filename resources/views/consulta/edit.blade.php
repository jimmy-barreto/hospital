@extends('layouts.layout')

@section('titulo', 'Modificar Consulta')

@section('contenido')
<h1 class="text-center">Modificar Consulta</h1>
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

        <form action="{{route('consulta.update', $consulta->id)}} " method="post">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha de la Consulta:</label>
                    <input type="date" class="form-control" name="fechaConsulta" value="{{$consulta->fechaConsulta}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Medico que lo atendio:</label>
                    <select name="idmedico" class="form-control">
                        @foreach ($medicos as $medico)
                            <option value="{{$medico->id}}"
                                @if ($consulta->idmedico == $medico->id)
                                    selected                                    
                                @endif>
                                
                            {{$medico->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Paciente:</label>
                    <select name="idpaciente" class="form-control">
                        @foreach ($pacientes as $paciente)
                            <option value="{{$paciente->id}}"
                                @if ($consulta->idpaciente == $paciente->id)
                                    selected                                    
                                @endif>
                                
                            {{$paciente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Modificar Consulta</button>
            </div>

        </form>

        <br><br>
        <div class="row">
            <a href=" {{route('consulta.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection