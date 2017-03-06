@extends('layout.template')
@section('cuerpoInterno')
<form id="frmEditarPersona" action="{{url('persona/editar')}}" method="post">
	<label for="txtNombre">Nombre</label>
	<input type="text" id="txtNombre" name="txtNombre" value="{{$tPersona->nombre}}">
	<br>
	<label for="txtApellido">Apellido</label>
	<input type="text" id="txtApellido" name="txtApellido" value="{{$tPersona->apellido}}">
	<br>
	<label for="txtCorreoElectronico">Correo</label>
	<input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico" value="{{$tPersona->correoElectronico}}">
	<br>
	<label for="dateFechaNacimiento">Fecha de nacimiento</label>
	<input type="date" id="dateFechaNacimiento" name="dateFechaNacimiento" value="{{date('Y-m-d', strtotime($tPersona->fechaNacimiento))}}">
	<br>
	<label for="txtEstatura">Estatura</label>
	<input type="text" id="txtEstatura" name="txtEstatura" value="{{$tPersona->estatura}}">
	<br>
	{{csrf_field()}}
	<input type="hidden" id="hdIdPersona" name="hdIdPersona" value="{{$tPersona->idPersona}}">
	<input type="button" value="Guardar cambios" onclick="enviarFrmEditarPersona();">
</form>
<script>
	function enviarFrmEditarPersona()
	{
		if(confirm('Confirmar operación'))
		{
			$('#frmEditarPersona').submit();
		}
	}
</script>
@endsection