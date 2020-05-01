@extends('layouts.layout')

@section('titulo')
Hospital
@endsection

@section('contenido')
    {{-- @include('hospital.modal') --}}
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

        <tbody id="tablaDatos">
            @foreach ($hospitals as $hospital)
            <tr>
                <td>{{$hospital->codigo}}</td>
                <td>{{$hospital->nombre}}</td>
                <td>
                    <form action="{{route('hospital.destroy', $hospital->id)}}" method="post">
                        <a href="{{route('hospital.show', $hospital->id)}}" class="btn btn-info">Mas información</a>
                        <a href="{{route('hospital.edit', $hospital->id)}}" class="btn btn-primary">Editar</a>
                        {{-- @can('editar-hospital')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$hospital->id}}" onclick="mostrar(this)">
                                Editar
                            </button>
                        @endcan --}}
                        
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
{{-- 
    <script>
        function mostrar(btn){
            console.log(btn.value);
            var ruta = "hospital/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                console.log(respuesta[0]);
                $('#codigo').val(respuesta[0].codigo);
                $('#nombre').val(respuesta[0].nombre);
                $('#direccion').val(respuesta[0].direccion);
                $('#telefono').val(respuesta[0].telefono);
                $('#cantidadCamas').val(respuesta[0].cantidadCamas);
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'hospital/' + id;

            $.ajax({
                data: datos,
                url: ruta,
                type: 'PUT',
                dataType: 'json',
                success: function(){
                    alert('Datos Modificados');
                    cargarDatos();
                }
            });
        });

        function cargarDatos(){
            var tabla = $('#tablaDatos');
            var ruta = 'hospitals';

            tabla.empty();

            $.get(ruta, function(respuesta){
                console.log(respuesta);
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.codigo + "</td><td>" + element.nombre  + "</td><td>" + element.direccion  + "</td><td>" + element.telefono  + "</td><td>" + element.cantidadCamas  +"</td><td> <button class='btn btn-info'>Ver</button> <button class='btn btn-primary'>Editar</button> <button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script> --}}

@endsection
