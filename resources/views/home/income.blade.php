@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Ingresos</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">            	
            	<a href="{{route('ahorro-voluntario')}}" class="list-group-item">Ahorro Voluntario</a>
            	<a href="{{route('pago-prestamo')}}" class="list-group-item">Pago Prestamos</a>
            </div>
        </div>
    </div>
</div>
@endsection