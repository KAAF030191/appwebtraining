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
@endsection