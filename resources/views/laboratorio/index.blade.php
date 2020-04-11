@extends('layouts.layout')

@section('titulo')
Laboratorio
@endsection

@section('contenido')
<h1 class="text-center">Laboratorio</h1>
<br><br>

@if ($consulta)
    <div class="alert alert-primary">
        <p>Los resultados de la bùsqueda <strong>{{$consulta}}</strong> son:</p>
    </div>
@endif

@if($message = Session::get('exito'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<br><br>

<table class="table table-bordered">

    <thead>
        <th>Nombre</th>
        <th>Acciones</th>
    </thead>

    <tbody>
        @foreach ($laboratorios as $laboratorio)
        <tr>
            <td>{{$laboratorio->nombre}}</td>
            <td>
                <form action="{{route('laboratorio.destroy', $laboratorio->id)}}" method="post">
                    <a href="{{route('laboratorio.show', $laboratorio->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('laboratorio.edit', $laboratorio->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
<br>

{{$laboratorios->links()}}

<br><br>
<div class="row">
    <a href="{{route('laboratorio.create')}}"><button class="btn btn-success">Agregar Laboratorio</button></a>&nbsp
    <a href="{{route('detalle.index')}}"><button class="btn btn-info">Agregar Detalle</button></a>
</div>

@endsection
