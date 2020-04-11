@extends('layouts.layout')

@section('titulo', 'Modificar Sala')

@section('contenido')
<h1 class="text-center">Modificar Sala</h1>
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

        <form action="{{route('sala.update', $sala->id)}} " method="post">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Codigo de la Sala:</label>
                    <input type="text" class="form-control" name="codigo" value="{{$sala->codigo}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre de la Sala:</label>
                    <input type="text" class="form-control" name="nombre" value="{{$sala->nombre}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cantidad de Camas de la Sala:</label>
                    <input type="number" class="form-control" name="cantidadCamas" value="{{$sala->cantidadCamas}}">
                </div>
            </div>

            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Hospital donde esta la Sala:</label>
                    <select name="idhospital" class="form-control">
                        @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}"
                                @if ($sala->idhospital == $hospital->id)
                                    selected                                    
                                @endif>
                                
                            {{$hospital->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-primary">Modificar Sala</button>
            </div>

        </form>

        <br><br>
        <div class="row">
            <a href=" {{route('sala.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>
@endsection