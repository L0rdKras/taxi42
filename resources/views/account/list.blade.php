@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Listado Cuentas</h2>
    <div class="page-hader">
        <div class="panel panel-default">
        	<div class="panel-heading">
              <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped">
		            <thead>
		              <tr>
		                <th>Nombre</th>
		                <th>Monto</th>
		                <th>Fondo</th>
		                <th>Info</th>
		              </tr>
		            </thead>
		            <tbody>
		              @foreach($accounts as $account)
		              <tr data-id="{{$account->id}}">
		                <td>{{$account->name}}</td>
		                <td>{{$account->amount}}</td>
		                <td>{{$account->Fondo->name}}</td>
		                <td>
		                	<a class="btn btn-info" role="button" href="#">Ver</a>
		                	<a class="btn btn-primary" role="button" href="#">Editar</a>
		                </td>
		              </tr>
		              @endforeach
		            </tbody>
		        </table>
		        {!! $accounts->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection