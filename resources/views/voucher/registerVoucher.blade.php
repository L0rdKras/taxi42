@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Registro de Vales</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	{!! Form::open(array('id'=>'formVoucher','route' => ['save-movil'],'method'=>'POST')) !!}
					{!! Form::hidden('rutaCuentas',route('cuentas-asociadas-socio',':ID'),array('id'=>'rutaCuentas')); !!}
	        		
				    <div class="row">
	        			<h4>
		        		{!! Form::label('person', 'Chofer',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('person',null,array('id'=>'person','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
					    <button class="btn btn-success" id="btnBuscarChofer">Buscar</button>
					    {!! Form::hidden('person_id',null,array('id'=>'person_id')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('movil', 'Movil',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('movil',null,array('id'=>'movil','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
					    <button class="btn btn-success" id="btnBuscarMovil">Buscar</button>
					    {!! Form::hidden('movil_id',null,array('id'=>'movil_id')); !!}
					    </h4>
				    </div>
				    
				    <div class="row">
				    	<h4>
				    		{!! Form::submit('Guardar',array('id'=>'guardar','class'=>'btn-success')); !!}
				    	</h4>
				    </div>
				{!! Form::close() !!}
			</div>
        </div>
    </div>

    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Cuentas Asociadas</div>
  			<div class="panel-body">
	        	<table class="table table-bordered table-hover">
            		<thead>
            			<tr>
            				<td>Cuenta</td>
            				<td>Valor</td>
            			</tr>
            		</thead>
            		<tbody id="detalleCuentas">
            			
            		</tbody>
            	</table>
            	<h4>
	            	<label for="" class="label label-default col-md-2">Total Cuentas</label>
	            	<input type="text" class="col-md-2" id="totalCuentas" value="" readonly>
            	</h4>
			</div>
        </div>
    </div>
</div>

<template id="filaCuentas">
	<tr>
		<th>:CUENTA</th>
		<th>:VALOR</th>
	</tr>
</template>


    <div class="modal fade bs-example-modal-lg" id="modal-search-driver" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistema Coleto: Choferes</h4>
          </div>
          <div class="modal-body">
            <div style="height:400px; overflow:auto">
            	<table class="table table-bordered table-hover">
            		<thead>
            			<tr>
            				<td>Apellidos</td>
            				<td>Nombres</td>
            				<td>Sel.</td>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($persons as $partner)
            			<tr data-id="{{$partner->id}}" data-name="{{$partner->firstName.' '.$partner->lastName}}">
            				<td>{{$partner->lastName}}</td>
            				<td>{{$partner->firstName}}</td>
            				<td><button class="btn btn-default agregaPartner">Agrega</button></td>
            			</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="modal-search-movil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistema Coleto: Moviles</h4>
          </div>
          <div class="modal-body">
            <div style="height:400px; overflow:auto">
            	<table class="table table-bordered table-hover">
            		<thead>
            			<tr>
            				<td>Placa Patente</td>
            				<td>Marca/Modelo</td>
            				<td>Propietario</td>
            				<td>Sel.</td>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($moviles as $movil)
            			<tr data-id="{{$movil->id}}" data-name="{{$movil->plate.'/'.$movil->mark.'/'.$movil->model}}" data-id-owner="{{$movil->Person->id}}">
            				<td>{{$movil->plate}}</td>
            				<td>{{$movil->mark.'/'.$movil->model}}</td>
            				<td>{{$movil->Person->firstName.' '.$movil->Person->lastName}}</td>
            				<td><button class="btn btn-default agregaPartner">Agrega</button></td>
            			</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('scripts')

<script src="{{ asset('js/registerVoucher.js')}}"></script>

@endsection