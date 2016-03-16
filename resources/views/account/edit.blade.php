@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Edicion de Cuentas</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	{!! Form::open(array('id'=>'formAccounts','route' => ['edita-cuenta',$cuenta->id],'method'=>'PATCH')) !!}
	        		<div class="row">
	        			<h4>
		        		{!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('name',$cuenta->name,array('id'=>'name','class'=>'col-md-2 campoIngreso', 'readonly'=>'true')); !!}
					    </h4>
				    </div>
	        	<div class="row">
	        			<h4>
		        		{!! Form::label('amount', 'Monto',array('class' => 'label label-default col-md-2')); !!}
					      {!! Form::text('amount',$cuenta->amount,array('id'=>'amount','class'=>'col-md-2 campoIngreso')); !!}
					    </h4>
				    </div>
            <div class="row">
                <h4>
                {!! Form::label('type', 'Tipo',array('class' => 'label label-default col-md-2')); !!}
              
                {!! Form::text('type',$cuenta->type, array('id'=>'type','class'=>'col-md-2 campoIngreso','readonly'=>'true') ); !!}
              </h4>
            </div>
            <div class="row">
                <h4>
                {!! Form::label('renovate', 'Periodicidad Cobro',array('class' => 'label label-default col-md-2')); !!}
              
                {!! Form::text('renovate',$cuenta->renovate, array('id'=>'renovate','class'=>'col-md-2 campoIngreso','readonly'=>'true') ); !!}
              </h4>
            </div>
            <div class="row">
                <h4>
                  <input type='hidden' name='formato_fecha' id="formato_fecha" value='yyyy/mm/dd'/>
                  {!! Form::label('init_date', 'Fecha Inicio Cobro',array('class' => 'label label-default col-md-2')); !!}
                  <input type="text" value="{{$cuenta->init_date}}" id="init_date" name="init_date" readonly size="10"/>
                  <button type='button' onclick='displayCalendar(document.getElementById("init_date"),document.getElementById("formato_fecha").value,this)'><span class="glyphicon glyphicon-search"></span></button>
                </h4>
            </div>
            <div class="row">
                <h4>
                  {!! Form::label('finish_date', 'Fecha Termino Cobro',array('class' => 'label label-default col-md-2')); !!} 
                  <input type="text" value="{{$cuenta->finish_date}}" id="finish_date" name="finish_date" readonly size="10"/>
                  <button type='button' onclick='displayCalendar(document.getElementById("finish_date"),document.getElementById("formato_fecha").value,this)'><span class="glyphicon glyphicon-search"></span></button>
                </h4>
            </div>
				    <div class="row">
	        			<h4>
		        		{!! Form::label('fondo', 'Fondo',array('class' => 'label label-default col-md-2')); !!}
					    {!! Form::text('fondo',$cuenta->Fondo->name,array('id'=>'fondo','class'=>'col-md-2 campoIngreso','readonly'=>'true')); !!}
  					    
  					    {!! Form::hidden('fondo_id',$cuenta->fondo_id,array('id'=>'fondo_id')); !!}
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

<script src="{{ asset('js/editAccount.js')}}"></script>

@endsection