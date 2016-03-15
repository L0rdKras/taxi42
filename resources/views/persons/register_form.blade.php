@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Registro de Personas</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	{!! Form::open(array('id'=>'formPersons','route' => ['save-person'],'method'=>'POST')) !!}
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('rut', 'RUT',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('rut',null,array('id'=>'rut','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('firstName', 'Nombres',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('firstName',null,array('id'=>'firstName','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('lastName', 'Apellidos',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('lastName',null,array('id'=>'lastName','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('address', 'Direccion',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('address',null,array('id'=>'address','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    
				    <div class="row">
	        			<h4>
		        		{!! Form::label('type', 'Tipo',array('class' => 'label label-default col-md-2')); !!}
					    
					    {!! Form::select('type', array(''=>'','Socio'=>'Socio','Chofer'=>'Chofer'), null, array('id'=>'type','class'=>'col-md-2 campoIngreso') ); !!}
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

@endsection

@section('scripts')

<script src="{{ asset('js/registerMedic.js')}}"></script>

@endsection