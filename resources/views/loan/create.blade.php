@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
  <h2>Prestamo Socio: Entrega</h2>
    <div class="page-hader">
        <div class="panel panel-default">

        <div class="panel-heading">Datos</div>
        <div class="panel-body">
          <input type="hidden" id="rutaCartola" value="{{route('get-cartola-loans',':ID')}}">
            {!! Form::open(array('id'=>'formLoan','route' => ['loan-save'],'method'=>'POST')) !!}
            <input type='hidden' name='formato_fecha' id="formato_fecha" value='yyyy/mm/dd'/>
            <div class="row">
              <h4>
                {!! Form::label('person', 'Socio',array('class' => 'label label-default col-md-2')); !!}
                {!! Form::text('person',null,array('id'=>'person','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
                <button class="btn btn-success" id="btnBuscarPartner">Buscar</button>
                {!! Form::hidden('person_id',null,array('id'=>'person_id')); !!}
              </h4>
            </div>
            <div class="row">
              <h4>
                <label for="date" class="label label-default col-md-2">Fecha Registro:</label> 
                <input type="text" id="date" name="date" readonly class="col-md-2 campoIngreso"/>
                <button type='button' onclick='displayCalendar(document.getElementById("date"),document.getElementById("formato_fecha").value,this)'><span class="glyphicon glyphicon-search"></span></button>
              </h4>
            </div>
            <div class="row">
              <h4>
                <label for="limit_date" class="label label-default col-md-2">Fecha Vencimiento:</label> 
                <input type="text" id="limit_date" name="limit_date" readonly class="col-md-2 campoIngreso"/>
                <button type='button' onclick='displayCalendar(document.getElementById("limit_date"),document.getElementById("formato_fecha").value,this)'><span class="glyphicon glyphicon-search"></span></button>
              </h4>
            </div>
	        	<div class="row">
	        			<h4>
		        		{!! Form::label('amount', 'Monto',array('class' => 'label label-default col-md-2')); !!}
					      {!! Form::text('amount',null,array('id'=>'amount','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
	        		
				    
				    <div class="row">
				    	<h4>
				    		{!! Form::submit('Guardar',array('id'=>'guardar','class'=>'btn btn-success')); !!}
				    	</h4>
				    </div>
				{!! Form::close() !!}
			</div>
        </div>
        <div class="panel panel-default">

  			<div class="panel-heading">Cartola Prestamos</div>
  				<div class="panel-body">
  					<table id="tablaCartola" class="table table-striped">
  						<thead>
  							<tr>
  								<th>Fecha</th>
                  <th>Fecha Vencimiento</th>
  								<th>Estado</th>
  								<th>Monto Prestamo</th>
  								<th>Abono</th>
  								<th>Saldo</th>
  							</tr>
  						</thead>
  						<tbody></tbody>
  					</table>
  				</div>
  			</div>
    </div>
</div>

<template id="filaPrestamos">
	<tr>
		<th>:DATE</th>
    <th>:DATELIMIT</th>
		<th>:STATUS</th>
		<th>:AMOUNT</th>
		<th>:PAYMENT</th>
		<th>:RESIDUE</th>
	</tr>
</template>

    <div class="modal fade bs-example-modal-lg" id="modal-search-partner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistema Coleto: Socios</h4>
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
            			@foreach($partners as $partner)
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


@endsection

@section('scripts')

<script src="{{ asset('js/egressLoan.js')}}"></script>

@endsection