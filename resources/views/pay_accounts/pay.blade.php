@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<input type="hidden" id="rutaData" value="{{ route('data-person',':ID')}}">
	<input type="hidden" id="rutaDataMovil" value="{{ route('pendings-movil',':ID')}}">
	<h2>Pago Cuentas</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body" id="dataOfPartner">
	        	<button id="btnBuscarPartner" class="btn btn-info">Selecciona Socio</button>
			</div>
        </div>
    </div>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Cuentas Pendientes</div>
  			<div class="panel-body" id="pendientes">
  				<table class="table table-hover">
				  <thead>
				  	<tr>
				  		<th>Fecha</th>
				  		<th>Deuda</th>
				  		<th></th>
				  	</tr>
				  </thead>
				  <tbody id="detallePendientes" style="max-height:400px; overflow:auto"></tbody>
				</table>
			</div>
        </div>
    </div>
</div>


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
            				<td>Nombre</td>
            				<td>Sel.</td>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($partners as $partner)
            			<tr data-id="{{$partner->id}}">
            				<td>{{$partner->firstName}} {{$partner->lastName}}</td>
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

<template id="templateDataPartner">
	<h4 class="row">
		<span class="label label-info col-md-3">Nombre</span>
		<span class="col-md-3">:NOMBRE</span>
	</h4>
	<h4 class="row">
		<span class="label label-info col-md-3">Movil</span>
		<select name="movil" id="movil" class="col-md-3">
			<option value=""></option>
		</select>
	</h4>
</template>

<template id="filaPendientes">
	<tr data-date=":FECHA" data-id=":ID">
		<th>:FECHA</th>
		<th>:TOTAL</th>
		<th><a href="" class="btn btn-warning pagar-pendiente">Pagar</a></th>
	</tr>
</template>
@endsection

@section('scripts')

<script src="{{ asset('js/payAccount.js')}}"></script>

@endsection