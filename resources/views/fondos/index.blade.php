@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Fondos</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	<a href="{{route('crear-fondo')}}" class="list-group-item">Registrar Fondo</a>
            </div>
        </div>
    </div>
</div>
@endsection