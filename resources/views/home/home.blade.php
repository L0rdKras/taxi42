@extends('layout')

@section('content')
<div class="container theme-showcase" style="padding-top:80px" role="main">
    <div class="jumbotron">
	  <h1>Hola {{Auth::user()->name}}</h1>
	  
	</div>
</div>
@endsection