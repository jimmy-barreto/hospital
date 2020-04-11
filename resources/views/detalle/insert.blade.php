@extends('layouts.layout')

@section('titulo')
    Ingreso de Nuevo Detalle
@endsection


@section('contenido')
<h1 class="text-center">Nuevo Detalle Laboratorio</h1>
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

        <form action="{{route('detalle.store')}} " method="post">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Descripcion de la Detalle:</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha del Detalle:</label>
                    <input type="date" class="form-control" name="fecha" placeholder="fecha">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Hospital donde lo envian:</label>
                    <select name="idhospital" class="form-control">
                        @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Laboratorio donde lo atienden:</label>
                    <select name="idlaboratorio" class="form-control">
                        @foreach ($laboratorios as $laboratorio)
                            <option value="{{$laboratorio->id}}">{{$laboratorio->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Crear Detalle</button>
            </div>

        </form>
        <br><br>
        <div class="row">
            <a href=" {{route('detalle.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection