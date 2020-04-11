@extends('layouts.layout')

@section('titulo', 'Modificar Detalle')

@section('contenido')
<h1 class="text-center">Modificar Detalle Laboratorio</h1>
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

        <form action="{{route('detalle.update', $detalle->id)}} " method="post">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Descripcion del detalle:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{$detalle->descripcion}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha del detalle:</label>
                    <input type="date" class="form-control" name="fecha" value="{{$detalle->fecha}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Hospital donde lo envian:</label>
                    <select name="idhospital" class="form-control">
                        @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}"
                                @if ($detalle->idhospital == $hospital->id)
                                    selected                                    
                                @endif>
                                
                            {{$hospital->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Laboratorio donde lo atienden:</label>
                    <select name="idlaboratorio" class="form-control">
                        @foreach ($laboratorios as $laboratorio)
                            <option value="{{$laboratorio->id}}"
                                @if ($detalle->idlaboratorio == $laboratorio->id)
                                    selected                                    
                                @endif>
                                
                            {{$laboratorio->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Modificar Detalle</button>
            </div>

        </form>

        <br><br>
        <div class="row">
            <a href=" {{route('detalle.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection