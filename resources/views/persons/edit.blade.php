@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Edicion de Personas</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	{!! Form::open(array('id'=>'formPersons','route' => ['update-person',$persona->id],'method'=>'PATCH')) !!}
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('rut', 'RUT',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('rut',$persona->rut,array('id'=>'rut','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
					    </h4>
				    </div>
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('firstName', 'Nombres',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('firstName',$persona->firstName,array('id'=>'firstName','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('lastName', 'Apellidos',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('lastName',$persona->lastName,array('id'=>'lastName','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('address', 'Direccion',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('address',$persona->address,array('id'=>'address','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('city', 'Ciudad',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('city',$persona->city,array('id'=>'city','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
				    
				    <div class="row">
	        			<h4>
		        		{!! Form::label('type', 'Tipo',array('class' => 'label label-default col-md-2')); !!}
					    
					    {!! Form::text('type', $persona->type, array('id'=>'type','class'=>'col-md-2 campoIngreso','readonly'=>'true') ); !!}
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

<script src="{{ asset('js/editPerson.js')}}"></script>

@endsection