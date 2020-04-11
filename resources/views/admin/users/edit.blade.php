@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Edicion de Usuario {{$user->name}}</div>

                <div class="card-body">
                <form action="{{route('users.update', $user)}}" method="post">
                    @csrf
                    @method('PUT')
                    @foreach ($roles as $rol)
                    <div class="form-check">
                        <input type="checkbox" name="rol[]" value="{{$rol->id}}">
                        <label>{{$rol->nombre}}</label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
