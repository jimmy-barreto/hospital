@extends('layouts.layout')

@section('titulo')
Hospital
@endsection

@section('contenido')
<h1 class="text-center">Hospitales</h1>
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
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </thead>

    <tbody>
        @foreach ($hospitals as $hospital)
        <tr>
            <td>{{$hospital->codigo}}</td>
            <td>{{$hospital->nombre}}</td>
            <td>
                <form action="{{route('hospital.destroy', $hospital->id)}}" method="post">
                    <a href="{{route('hospital.show', $hospital->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('hospital.edit', $hospital->id)}}" class="btn btn-primary">Editar</a>                    
                    
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

{{$hospitals->links()}}

<br><br>
<div class="row">
    <a href="{{route('hospital.create')}}"><button class="btn btn-success">Agregar Hospital</button></a>  &nbsp;
    <a href="{{route('sala.index')}}"><button class="btn btn-secondary">Agregar Sala</button></a> &nbsp;
    <a href="{{route('medico.index')}}"><button class="btn btn-secondary">Agregar Medico</button></a> &nbsp;
    <a href="{{route('paciente.index')}}"><button class="btn btn-secondary">Agregar Paciente</button></a> &nbsp;
    <a href="{{route('laboratorio.index')}}"><button class="btn btn-secondary">Agregar Laboratorio</button></a> &nbsp;
    <a href="{{route('diagnostico.index')}}"><button class="btn btn-secondary">Agregar Diagnostico</button></a> &nbsp;
    <a href="{{route('detalle.index')}}"><button class="btn btn-secondary">Agregar Detalle</button></a>  <br><br>
    <a href="{{route('consulta.index')}}"><button class="btn btn-secondary">Agregar Consulta</button></a> &nbsp;
    <a href="{{route('vdiag.index')}}"><button class="btn btn-secondary">Agregar Resultado</button></a>
</div>

@endsection
