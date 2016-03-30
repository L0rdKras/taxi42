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
		                <th>Nombre</th>
		                <th>Nombre Usuario</th>
		                <th>Rol</th>
		                <th>Email</th>
		                <th>Info</th>
		              </tr>
		            </thead>
		            <tbody>
		              @foreach($users as $user)
		              <tr data-id="{{$user->id}}">
		                <td>{{$user->name}}</td>
		                <td>{{$user->username}}</td>
		                <td>{{$user->role}}</td>
		                <td>{{$user->email}}</td>
		                <td></td>
		              </tr>
		              @endforeach
		            </tbody>
		        </table>
		        {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection