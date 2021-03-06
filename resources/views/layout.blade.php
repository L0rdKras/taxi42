<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Colectivos</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body role="document">
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Linea 42</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Inicio</a></li>
            <li><a href="{{route('registro')}}">Registro</a></li>
            <li><a href="{{route('ingresos')}}">Ingresos</a></li>
            <li><a href="{{route('egresos')}}">Egresos</a></li>
            <li><a href="{{route('disciplina')}}">Disciplina</a></li>
            <?php
            if (Auth::check()){
              ?><li><a href="{{route('logOut')}}">Logout</a></li><?php
            }

            ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	@yield('content')

  <!--Templates utiles -->
  <template id="modalTemplate">
    <div class="modal fade bs-example-modal-lg" id="modal-confirmation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sistema Coleto</h4>
          </div>
          <div class="modal-body">
            <p>:MENSAJE</p>
          </div>

        </div>
      </div>
    </div>
  </template>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="{{ asset('js/rut.js')}}"></script>
  <!--calendario-->
  <link type="text/css" rel="stylesheet" href="{{ asset('dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112') }}" media="screen"></LINK>
  <script type="text/javascript" src="{{ asset('dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118')}}"></script>
<!--calendario-->

	@yield('scripts')
</body>
</html>
