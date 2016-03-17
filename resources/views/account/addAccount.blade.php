@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
	<h2>Asignar Cuentas A Una Persona</h2>
    <div class="page-hader">
        <div class="panel panel-default">

  			<div class="panel-heading">Datos</div>
  			<div class="panel-body">
	        	<h3>
	        		{{$person->firstName}} {{$person->lastName}}
	        	</h3>
	        	<h3>
	        		{{$person->type}}
	        	</h3>
			</div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/registerPerson.js')}}"></script>

@endsection