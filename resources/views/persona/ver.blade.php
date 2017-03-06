@extends('layout.template')
@section('cuerpoInterno')
<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo electrónico</th>
			<th>Fecha de nacimiento</th>
			<th>Estatura</th>
			<th>Fecha de registro</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listaTPersona as $item)
			<tr>
				<td>{{$item->nombre}}</td>
				<td>{{$item->apellido}}</td>
				<td>{{$item->correoElectronico}}</td>
				<td>{{$item->fechaNacimiento}}</td>
				<td>{{$item->estatura}}</td>
				<td>{{$item->fechaRegistro}}</td>
				<td>
					<input type="button" value="Eliminar" onclick="eliminarPersona({{$item->idPersona}});">
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<script>
	function eliminarPersona(idPersona)
	{
		if(confirm('Confirmar operación'))
		{
			window.location.href='{{url('persona/eliminar')}}/'+idPersona;
		}
	}
</script>
@endsection