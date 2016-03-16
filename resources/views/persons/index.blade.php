@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Personas</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	<a href="{{route('crear-persona')}}" class="list-group-item">Registrar Personas</a>
            	<a href="{{route('lista-personas')}}" class="list-group-item">Listado Personas</a>
            </div>
        </div>
    </div>
</div>
@endsection