@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Registros</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	<a href="{{route('personas')}}" class="list-group-item">Registrar Personas</a>
            	<a href="{{route('moviles')}}" class="list-group-item">Registrar Moviles</a>
            	<a href="{{route('fondos')}}" class="list-group-item">Registrar Fondos</a>
            	<a href="{{route('cuentas')}}" class="list-group-item">Registrar Cuentas</a>
            </div>
        </div>
    </div>
</div>
@endsection