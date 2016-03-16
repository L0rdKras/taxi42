@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Registro de Cuentas</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	{!! Form::open(array('id'=>'formAccounts','route' => ['save-cuenta'],'method'=>'POST')) !!}
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('name',null,array('id'=>'name','class'=>'col-md-2 campoIngreso')); !!}
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
                {!! Form::label('type', 'Tipo',array('class' => 'label label-default col-md-2')); !!}
              
                {!! Form::select('type', array(''=>'','Exigible'=>'Exigible','No Exigible'=>'No Exigible'), null, array('id'=>'type','class'=>'col-md-2 campoIngreso') ); !!}
              </h4>
            </div>
            <div class="row">
                <h4>
                {!! Form::label('renovate', 'Periodicidad Cobro',array('class' => 'label label-default col-md-2')); !!}
              
                {!! Form::select('renovate', array(''=>'','1'=>'Diario','7'=>'Semanal','30'=>'Mensual','365'=>'Anual'), null, array('id'=>'renovate','class'=>'col-md-2 campoIngreso') ); !!}
              </h4>
            </div>
            <div class="row">
                <h4>
                  <input type='hidden' name='formato_fecha' id="formato_fecha" value='yyyy/mm/dd'/>
                  {!! Form::label('init_date', 'Fecha Inicio Cobro',array('class' => 'label label-default col-md-2')); !!}
                  <input type="text" id="init_date" name="init_date" readonly size="10"/>
                  <button type='button' onclick='displayCalendar(document.getElementById("init_date"),document.getElementById("formato_fecha").value,this)'><span class="glyphicon glyphicon-search"></span></button>
                </h4>
            </div>
            <div class="row">
                <h4>
                  {!! Form::label('finish_date', 'Fecha Termino Cobro',array('class' => 'label label-default col-md-2')); !!} 
                  <input type="text" id="finish_date" name="finish_date" readonly size="10"/>
                  <button type='button' onclick='displayCalendar(document.getElementById("finish_date"),document.getElementById("formato_fecha").value,this)'><span class="glyphicon glyphicon-search"></span></button>
                </h4>
            </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('fondo', 'Fondo',array('class' => 'label label-default col-md-2')); !!}
					      {!! Form::text('fondo',null,array('id'=>'fondo','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
  					    <button class="btn btn-success" id="btnBuscarPartner">Buscar</button>
  					    {!! Form::hidden('fondo_id',null,array('id'=>'fondo_id')); !!}
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
</div>


    <div class="modal fade bs-example-modal-lg" id="modal-search-fondo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistema Coleto: Fondos</h4>
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
            			@foreach($fondos as $fondo)
            			<tr data-id="{{$fondo->id}}" data-name="{{$fondo->name}}">
            				<td>{{$fondo->name}}</td>
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

<script src="{{ asset('js/registerAccount.js')}}"></script>

@endsection