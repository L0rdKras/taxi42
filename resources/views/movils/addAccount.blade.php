@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <div class="page-hader">
		<h1>Asignar cuentas</h1>
    </div>
    <div class="panel panel-default">

		<div class="panel-heading">Datos Movil</div>
		<div class="panel-body">
        	<h3>
        		Cuentas del movil {{$movil->number}} perteneciente a {{$movil->Person->firstName}} {{$movil->Person->lastName}}
        	</h3>
		</div>
    </div>
    <div class="row">
    	<div class="panel panel-default col-md-6">
    		<div class="panel-heading">Cuentas No Exigibles</div>
    		<div class="panel-body">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<th>Nombre</th>
    						<th>Monto</th>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach($accounts as $account)
    					<tr class="cuentasAgregables" data-id='{{$account->id}}' data-name='{{$account->name}}' data-amount='{{$account->amount}}'>
    						<th>{{$account->name}}</th>
    						<th>{{$account->amount}}</th>
    					</tr>
    					@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="panel panel-default col-md-6">
    		<div class="panel-heading">Cuentas Agregadas</div>
    		<div class="panel-body">
    			<table class="table table-striped" id="added_accounts">
    				<thead>
    					<tr>
    						<th>Nombre</th>
    						<th>Monto</th>
    						<th>Opciones</th>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach($movil->accounts as $accountOfPerson)
    					<tr class="cuentasAgregadas" data-id='{{$accountOfPerson->id}}'>
    						<th>{{$accountOfPerson->name}}</th>
    						<th>{{$accountOfPerson->amount}}</th>
    						<th><a href="" class="alert-danger btnRemoveList"><span class="glyphicon glyphicon-remove"></span></a></th>
    					</tr>
    					@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>

{!! Form::open(array('id'=>'formAdd','route' => ['add-account-movil',$movil->id],'method'=>'POST')) !!}
{!! Form::hidden('account_id', null, array('id'=>'account_id') ); !!}
{!! Form::close() !!}

{!! Form::open(array('id'=>'formDelete','route' => ['delete-account-movil',$movil->id],'method'=>'POST')) !!}
{!! Form::hidden('delete_id', null, array('id'=>'delete_id') ); !!}
{!! Form::close() !!}
<template id="filaDinamica">
	<tr class="cuentasAgregadas" data-id=':ID'>
		<th>:NOMBRE</th>
		<th>:MONTO</th>
		<th><a href="" class="alert-danger btnRemoveList"><span class="glyphicon glyphicon-remove"></span></a></th>
	</tr>
</template>

@endsection

@section('scripts')

<script src="{{ asset('js/addAccount.js')}}"></script>

@endsection
