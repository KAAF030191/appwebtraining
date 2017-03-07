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
					<a href="{{url('index/parametrourl')}}">URL's con parámetros</a>
				</li>
			</ul>
		</nav>
	</header>
	<section id="sectionCuerpoGeneral">
		@yield('cuerpoInterno')
	</section>
	<footer>
	</footer>
</body>
</html>