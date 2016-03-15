@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Registro de Moviles</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	{!! Form::open(array('id'=>'formMovils','route' => ['save-movil'],'method'=>'POST')) !!}
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('plate', 'Placa Patente',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('plate',null,array('id'=>'plate','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('mark', 'Marca',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('mark',null,array('id'=>'mark','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('model', 'Modelo',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('model',null,array('id'=>'model','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('person', 'Dueño',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('person',null,array('id'=>'person','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
					    <button class="btn btn-success" id="btnBuscarPartner">Buscar</button>
					    {!! Form::hidden('person_id',null,array('id'=>'person_id')); !!}
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


    <div class="modal fade bs-example-modal-lg" id="modal-search-partner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistema Coleto: Dueños Colectivos</h4>
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

<script src="{{ asset('js/registerMovil.js')}}"></script>

@endsection