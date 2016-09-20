@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Listado Personas</h2>
    <div class="page-hader">
        <div class="panel panel-default">
        	<div class="panel-heading">
              <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped">
		            <thead>
		              <tr>
		                <th>Apellidos</th>
		                <th>Nombres</th>
		                <th>Tipo</th>
		                <th>Info</th>
		              </tr>
		            </thead>
		            <tbody>
		              @foreach($persons as $person)
		              <tr data-id="{{$person->id}}">
		                <td>{{$person->lastName}}</td>
		                <td>{{$person->firstName}}</td>
		                <td>{{$person->type}}</td>
		                <td>
		                	<a class="btn btn-info" role="button" href="#">Ver</a>
		                	<a class="btn btn-primary btnEdicionPersona" role="button" href="{{route('editar-persona', ['id' => $person->id])}}">Editar</a>
		                </td>
		              </tr>
		              @endforeach
		            </tbody>
		        </table>
		        {!! $persons->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
