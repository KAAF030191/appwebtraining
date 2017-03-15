@extends('layout.template')
@section('cuerpoInterno')
<form id="frmInsertarPersona" action="{{url('persona/insertar')}}" method="post" enctype="multipart/form-data">
	<label for="txtNombre">Nombre</label>
	<input type="text" id="txtNombre" name="txtNombre">
	<br>
	<label for="txtApellido">Apellido</label>
	<input type="text" id="txtApellido" name="txtApellido">
	<br>
	<label for="txtCorreoElectronico">Correo</label>
	<input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico">
	<br>
	<label for="passContrasenia">Contraseña</label>
	<input type="password" id="passContrasenia" name="passContrasenia">
	<br>
	<label for="fileAvatar">Avatar</label>
	<input type="file" id="fileAvatar" name="fileAvatar">
	<br>
	<label for="dateFechaNacimiento">Fecha de nacimiento</label>
	<input type="date" id="dateFechaNacimiento" name="dateFechaNacimiento">
	<br>
	<label for="txtEstatura">Estatura</label>
	<input type="text" id="txtEstatura" name="txtEstatura">
	<br>
	{{csrf_field()}}
	<input type="button" value="Registrar datos" onclick="enviarFrmInsertarPersona();">
</form>
<script>
	function enviarFrmInsertarPersona()
	{
		if(confirm('Confirmar operación'))
		{
			$('#frmInsertarPersona').submit();
		}
	}
</script>
@endsection