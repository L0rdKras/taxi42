@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <h1>Disciplina</h1>
    <div class="page-hader row">
        <div class="panel panel-primary col-md-6">
            <div class="list-group">
            	<a href="{{route('citacion')}}" class="list-group-item">Registrar Citacion</a>
            	<a href="" class="list-group-item">Pagar</a>
            </div>
        </div>
    </div>
</div>
@endsection
