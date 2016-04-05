@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Egresos</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	
            	<a href="{{route('ahorro-voluntario-egreso')}}" class="list-group-item">Retiro Ahorro Voluntario</a>
            	<a href="{{route('ahorro-voluntario')}}" class="list-group-item">Prestamo a Socios</a>
            </div>
        </div>
    </div>
</div>
@endsection