@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Pago Prestamo N° {{$loan->id}}</h2>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Informacion</h3>
	  </div>
	  <div class="panel-body">
	    <h4 class="row">
	    	<span class="col-md-4 label label-default">
	    		Socio
	    	</span> 
	    	<span class="col-md-2">
	    		{{$loan->Person->firstName}} {{$loan->Person->lastName}}
	    	</span>
	    </h4>
	    <h4 class="row">
	    	<span class="col-md-4 label label-default">
	    		Prestamo
	    	</span> 
	    	<span class="col-md-2">
	    		$ {{$loan->amount}}
	    	</span>
	    </h4>
	    <h4 class="row">
	    	<span class="col-md-4 label label-default">
	    		Total Abonos
	    	</span> 
	    	<span class="col-md-2">
	    		$ {{$ingresos}}
	    	</span>
	    </h4>
	    <h4 class="row">
	    	<span class="col-md-4 label label-default">
	    		Fecha Prestamo
	    	</span> 
	    	<span class="col-md-2">
	    		{{$loan->date}}
	    	</span>
	    </h4>
	    <h4 class="row">
	    	<span class="col-md-4 label label-warning">
	    		Fecha Vencimiento
	    	</span> 
	    	<span class="col-md-2">
	    		{{$loan->limit_date}}
	    	</span>
	    </h4>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Pagar/Abono</h3>
	  </div>
	  <div class="panel-body">
	  	{!! Form::open(array('id'=>'formLoan','route' => ['pay-loan',$loan->id],'method'=>'POST')) !!}
        
        <div class="row">
          <h4>
            {!! Form::label('amount','Abono',array('class' => 'label label-default col-md-4')); !!}
            {!! Form::text('amount',null,array('id'=>'amount','class'=>'col-md-2 campoIngreso')); !!}
            <button class="btn btn-success" id="abonarPrestamo">Abonar</button>
          </h4>
        </div>
        
		{!! Form::close() !!}
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Movimientos Asociados al Prestamo</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-hover">
	    	<thead>
	    		<tr>
	    			<th>Fecha</th>
		    		<th>Ingreso</th>
		    		<th>Egreso</th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($loan->Movements as $movement)
	    		<tr>
	    			<th>{{$movement->created_at}}</th>
		    		<th>{{$movement->ingress}}</th>
		    		<th>{{$movement->egress}}</th>
	    		</tr>
	    		@endforeach
	    	</tbody>
		</table>
	  </div>
	</div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/payingLoan.js')}}"></script>

@endsection