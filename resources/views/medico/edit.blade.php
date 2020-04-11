@extends('layouts.layout')

@section('titulo', 'Modificar Medico')

@section('contenido')
<h1 class="text-center">Modificar medico</h1>
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

        <form action="{{route('medico.update', $medico->id)}} " method="post">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cedula del medico:</label>
                    <input type="text" class="form-control" name="cedula" value="{{$medico->cedula}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del medico:</label>
                    <input type="text" class="form-control" name="nombre" value="{{$medico->nombre}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Especializacion del Médico:</label>
                    <input type="text" class="form-control" name="especialidad" value="{{$medico->especialidad}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Hospital donde trabaja el Medico:</label>
                    <select name="idhospital" class="form-control">
                        @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}"
                                @if ($medico->idhospital == $hospital->id)
                                    selected                                    
                                @endif>
                                
                            {{$hospital->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Modificar Medico</button>
            </div>

        </form>

        <br><br>
        <div class="row">
            <a href=" {{route('medico.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection