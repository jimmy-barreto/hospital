@extends('layouts.layout')

@section('titulo')
Paciente
@endsection

@section('contenido')
<h1 class="text-center">Paciente</h1>
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
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </thead>

    <tbody>
        @foreach ($pacientes as $paciente)
        <tr>
            <td>{{$paciente->cedula}}</td>
            <td>{{$paciente->nombre}}</td>
            <td>
                <form action="{{route('paciente.destroy', $paciente->id)}}" method="post">
                    <a href="{{route('paciente.show', $paciente->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-primary">Editar</a>
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

{{$pacientes->links()}}

<br><br>
<div class="row">
    <a href="{{route('paciente.create')}}"><button class="btn btn-success">Agregar Paciente</button></a>&nbsp;
    <a href="{{route('consulta.index')}}"><button class="btn btn-secondary">Ver Consulta</button></a>&nbsp;
    <a href="{{route('diagnostico.index')}}"><button class="btn btn-info">Ver Diagnostico</button></a>&nbsp;
    <a href="{{route('vdiag.index')}}"><button class="btn btn-dark">Ver Resultado</button></a>
</div>

@endsection
