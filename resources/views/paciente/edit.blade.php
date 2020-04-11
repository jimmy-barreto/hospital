@extends('layouts.layout')

@section('titulo', 'Modificar Paciente')

@section('contenido')
<h1 class="text-center">Modificar Paciente</h1>
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

        <form action="{{route('paciente.update', $paciente->id)}} " method="post">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cedula del Paciente:</label>
                    <input type="number" class="form-control" name="cedula" value="{{$paciente->cedula}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del Paciente:</label>
                    <input type="text" class="form-control" name="nombre" value="{{$paciente->nombre}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Direccion del Paciente:</label>
                    <input type="text" class="form-control" name="direccion" value="{{$paciente->direccion}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha de Nacimiento del Paciente:</label>
                    <input type="number" class="form-control" name="fechaNacimiento" value="{{$paciente->fechaNacimiento}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Genero del Paciente:</label>
                    <input type="text" class="form-control" name="genero" value="{{$paciente->genero}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Numero de Registro del Paciente:</label>
                    <input type="number" class="form-control" name="numeroRegistro" value="{{$paciente->numeroRegistro}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Numero de Cama del Paciente:</label>
                    <input type="number" class="form-control" name="numeroCama" value="{{$paciente->numeroCama}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sala donde esta el Paciente:</label>
                    <select name="idsala" class="form-control">
                        @foreach ($salas as $sala)
                            <option value="{{$sala->id}}"
                                @if ($sala->idsala == $sala->id)
                                    selected                                    
                                @endif>
                                
                            {{$sala->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <button type="submit" class="btn btn-primary">Modificar Paciente</button>
            </div>

        </form>

        <br><br>
        <div class="row">
            <a href=" {{route('paciente.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection