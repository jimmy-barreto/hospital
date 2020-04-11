@extends('layouts.layout')

@section('titulo')
    Ingreso de Nuevo Medico
@endsection


@section('contenido')
<h1 class="text-center">Nuevo Medico</h1>
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

        <form action="{{route('medico.store')}} " method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cedula del Medico:</label>
                    <input type="number" class="form-control" name="cedula" placeholder="cedula">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del Medico:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Especializacion del Medico:</label>
                    <input type="text" class="form-control" name="especialidad" placeholder="especialidad">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Hospital donde trabaja el Medico:</label>
                    <select name="idhospital" class="form-control">
                        @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Crear Medico</button>
            </div>

        </form>
        <br><br>
        <div class="row">
            <a href=" {{route('medico.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection