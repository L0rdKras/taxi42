@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Usuarios</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	<a href="{{route('crear-usuario')}}" class="list-group-item">Crear Usuario</a>
            	<a href="{{route('lista-usuarios')}}" class="list-group-item">Listado Usuarios</a>
            </div>
        </div>
    </div>
</div>
@endsection