@extends('layouts.layout')

@section('titulo')
Sala
@endsection

@section('contenido')
<h1 class="text-center">Sala</h1>
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
    </thead>

    <tbody>
        @foreach ($salas as $sala)
        <tr>
            <td>{{$sala->nombre}}</td>
            <td>
                <form action="{{route('sala.destroy', $sala->id)}}" method="post">
                    <a href="{{route('sala.show', $sala->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('sala.edit', $sala->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

{{$salas->links()}}

<br><br>
<div class="row">
    <a href="{{route('sala.create')}}"><button class="btn btn-success">Crear Sala</button> &nbsp </a>
    <a href=" {{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>
</div>
@endsection
