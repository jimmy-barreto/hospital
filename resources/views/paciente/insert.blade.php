@extends('layouts.layout')

@section('titulo')
    Ingreso de Nuevo Paciente
@endsection


@section('contenido')
<h1 class="text-center">Nuevo Paciente</h1>
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

        <form action="{{route('paciente.store')}} " method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cedula del Paciente:</label>
                    <input type="number" class="form-control" name="cedula" placeholder="cedula">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del Paciente:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Direccion del Paciente:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="direccion">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha de Nacimiento del Paciente:</label>
                    <input type="date" class="form-control" name="fechaNacimiento" placeholder="fecha nacimiento">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Genero del Paciente:</label>
                    <input type="text" class="form-control" name="genero" placeholder="genero" list="genero">
                    <datalist id="genero" >
                        <option value="Femenino">
                          <option value="Masculino">
                    </datalist>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Registro del Paciente:</label>
                    <input type="number" class="form-control" name="numeroRegistro" placeholder="numero registro">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Numero de Cama del Paciente:</label>
                    <input type="number" class="form-control" name="numeroCama" placeholder="numero cama">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sala donde esta el Paciente:</label>
                    <select name="idsala" class="form-control">
                        @foreach ($salas as $sala)
                            <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Crear Paciente</button>
            </div>

        </form>
        <br><br>
        <div class="row">
            <a href=" {{route('paciente.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection