@extends('layout.template')
@section('cuerpoInterno')
<form action="{{url('index/index')}}" method="post">
	<label for="txtNombre">Nombre</label>
	<input type="text" id="txtNombre" name="txtNombre">
	<label for="txtApellido">Apellido</label>
	<input type="text" id="txtApellido" name="txtApellido">

	{{csrf_field()}}
	<input type="submit" value="Enviar datos">
</form>
<hr>
{{$nombre or ''}} {{$apellido or ''}}
<hr>
<form action="{{url('persona/login')}}" method="post">
	<label for="txtCorreoElectronicoLogIn">Correo electrónico</label>
	<input type="text" id="txtCorreoElectronicoLogIn" name="txtCorreoElectronicoLogIn">
	<label for="passContraseniaLogIn">Contraseña</label>
	<input type="password" id="passContraseniaLogIn" name="passContraseniaLogIn">
	{{csrf_field()}}
	<input type="submit" value="Acceder">
</form>
<br>
<input type="button" id="btnVerListaUsuarios" name="btnVerListaUsuarios" value="Ver lista de usuarios" onclick="listarPersonasConAjax();">
<div id="divListaPersonas"></div>
<input type="button" id="btnObtenerHoraConAjax" name="btnObtenerHoraConAjax" value="Obtener hora del servidor" onclick="obtenerHoraConAjax();">
<span id="spanHoraActual"></span>
<script>
	function listarPersonasConAjax()
	{
		$.ajax(
		{
			method: 'POST',
			url: '{{url('persona/listarpersonasconajax')}}',
			data: {_token : '{{csrf_token()}}'}
		})
		.done(function(result)
		{
			$('#divListaPersonas').html(result);
		});
	}

	function obtenerHoraConAjax()
	{
		$.ajax(
		{
			method: 'POST',
			url: '{{url('index/obtenerhoraconajax')}}',
			data: {_token : '{{csrf_token()}}'}
		})
		.done(function(result)
		{
			$('#spanHoraActual').text(result.horaActual);
		});
	}
</script>
@endsection