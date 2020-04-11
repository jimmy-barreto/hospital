@extends('layouts.layout')

@section('titulo')
Resultado
@endsection

@section('contenido')
<h1 class="text-center">Resultado</h1>
<br><br>

@if($message = Session::get('exito'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<br><br>

<table class="table table-bordered">

    <thead>
        <th>Fecha</th>
    </thead>

    <tbody>
        @foreach ($vdiag as $vdiag)
        <tr>
            <td>{{$vdiag->fecha}}</td>
            <td>
                <form action="{{route('vdiag.destroy', $vdiag->id)}}" method="post">
                    <a href="{{route('vdiag.show', $vdiag->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('vdiag.edit', $vdiag->id)}}" class="btn btn-primary">Editar</a>
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
    <a href="{{route('vdiag.create')}}"><button class="btn btn-success">Crear Resultado</button></a>
</div>
@endsection
