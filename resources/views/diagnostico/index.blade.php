@extends('layouts.layout')

@section('titulo')
Diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Diagnostico</h1>
<br><br>

@if($message = Session::get('exito'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<br><br>

<table class="table table-bordered">

    <thead>
        <th>codigo</th>
        <th>Acciones</th>
    </thead>

    <tbody>
        @foreach ($diagnosticos as $diagnostico)
        <tr>
            <td>{{$diagnostico->codigo}}</td>
            <td>
                <form action="{{route('diagnostico.destroy', $diagnostico->id)}}" method="post">
                    <a href="{{route('diagnostico.show', $diagnostico->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('diagnostico.edit', $diagnostico->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<br><br>
<div class="row">
    <a href="{{route('diagnostico.create')}}"><button class="btn btn-success">Agregar Diagnostico</button></a>
</div>

@endsection
