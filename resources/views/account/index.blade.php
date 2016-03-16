@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Cuenta</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	<a href="{{route('crear-cuenta')}}" class="list-group-item">Registrar Cuenta</a>
            	<a href="{{route('listado-cuentas')}}" class="list-group-item">Listado Cuentas</a>
            </div>
        </div>
    </div>
</div>
@endsection