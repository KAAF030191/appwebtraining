<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>App Training</title>

	<link rel="stylesheet" href="{{asset('css/cssLayout.css')}}">
	<link rel="stylesheet" href="{{asset('css/cssMenuPrincipal.css')}}">

	<script src="{{asset('js/prefixfree.min.js')}}"></script>
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script src="{{asset('js/jsValidacion.js')}}"></script>
</head>
<body>
	<header>
		<nav id="navMenuPrincipal">
			<ul>
				<li>
					<a href="{{url('/')}}">Inicio</a>
				</li><li>
					<a href="{{url('persona/insertar')}}">Insertar persona</a>
				</li><li>
					<a href="{{url('persona/ver')}}">Ver personas</a>
				</li>
				<li>
					<a href="{{url('telefono/ver')}}">Ver teléfonos</a>
				</li>
				<li>
					<a href="{{url('index/parametrourl')}}">URLs con parámetros</a>
				</li>
				<li>
					<a href="{{url('index/subirarchivo')}}">Subir archivo</a>
				</li>
				<li>
					<a href="{{url('index/descargararchivo')}}">Descargar archivo</a>
				</li>
			</ul>
		</nav>
		<div style="color: #ffffff;position: absolute;right: 10px;top: 25px;">
			@if(Session::has('idPersona'))
				<img src="{{asset('img/avatar').'/'.Session::get('idPersona').'.'.Session::get('extensionAvatar')}}" width="30px" height="30px" style="display: inline-block;vertical-align: middle;">
				<span style="vertical-align: middle;">{{Session::get('nombre')}}</span>
				<a href="{{url('persona/logout')}}" style="color: #ffffff;">Cerrar sesión</a>
			@else
				<span>Anónimo</span>
			@endif
		</div>
	</header>
	<section id="sectionCuerpoGeneral">
		<div id="divMensajeGeneral"></div>
		@if(Session::has('mensajeGeneral'))
			<script>
				$('#divMensajeGeneral').html('{{Session::get('mensajeGeneral')}}');
				$('#divMensajeGeneral').css({'background-color' : '{{Session::get('color')}}'});
			</script>
		@endif
		@yield('cuerpoInterno')
	</section>
	<footer>
	</footer>
</body>
</html>