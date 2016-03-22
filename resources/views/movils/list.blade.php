@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Listado Moviles</h2>
    <div class="page-hader">
        <div class="panel panel-default">
        	<div class="panel-heading">
              <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped">
		            <thead>
		              <tr>
		                <th>Placa</th>
		                <th>Marca</th>
		                <th>Modelo</th>
		                <th>Propietario</th>
		              </tr>
		            </thead>
		            <tbody>
		              @foreach($movils as $movil)
		              <tr data-id="{{$movil->id}}">
		                <td>{{$movil->plate}}</td>
		                <td>{{$movil->mark}}</td>
		                <td>{{$movil->model}}</td>
		                <td>{{$movil->Person->firstName.' '.$movil->Person->lastName}}</td>
		              </tr>
		              @endforeach
		            </tbody>
		        </table>
		        {!! $movils->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection