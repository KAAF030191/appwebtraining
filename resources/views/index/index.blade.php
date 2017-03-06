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
@endsection