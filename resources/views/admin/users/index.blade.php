@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    <table class="table table-hover">
                    <thead>   
                        <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    {{implode(',',$usuario->roles()->get()->pluck('nombre')->toArray())}}
                                </td>
                                <td>
                                    <a href="{{route('users.edit', $usuario->id)}}"><button class="btn btn-warning float-left" type="button">Editar</button></a>
                                    <form action="{{route('users.destroy', $usuario)}} " method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        &nbsp;
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
