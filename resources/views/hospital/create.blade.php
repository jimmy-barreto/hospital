@extends('layouts.layout')

@section('titulo')
    Crear Nuevo Hospital
@endsection

@section('contenido')
<h1 class="text-center">Crear Nuevo Hospital</h1>
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

        <form action="{{route('hospital.store')}} " method="post" id="formulario">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Codigo del Hospital:</label>
                    <input type="text" class="form-control" name="codigo" placeholder="Codigo" id="codigo">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del Hospital:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Dirección del Hospital:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Direccion" id="direccion">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Telefono del Hospital:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="0" id="telefono">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cantidad de Camas del Hospital:</label>
                    <input type="number" class="form-control" name="cantidadCamas" placeholder="0" id="cantidadCamas">
                </div>
            </div>

            <div class="form-row">
                {{-- <button type="submit" class="btn btn-primary">Crear Hospital</button> --}}
                <a href="#" class="btn btn-primary" id="registro">Crear Hospital</a>
            </div>

        </form>
        <br><br>
        <div class="row">
            <a href=" {{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>
         </div>

         <script>
             $('#registro').click(function(){
                var datos = $('#formulario').serialize();
                var ruta = 'guardar';

                $.ajax({
                    data: datos,
                    url: ruta,
                    type: 'POST',
                    dataType: 'json',
                    success: function(){
                        alert('Datos almacenados!');
                        $('#codigo').val('');
                        $('#nombre').val('');
                        $('#direccion').val('');
                        $('#telefono').val('');
                        $('#cantidadCamas').val('');
                    }
                });
             });
         </script>
@endsection