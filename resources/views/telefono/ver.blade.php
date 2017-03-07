@extends('layout.template')
@section('cuerpoInterno')
<table>
	<thead>
		<tr>
			<th>Persona</th>
			<th>Número teléfono</th>
			<th>Operador</th>
		</tr>
	</thead>
	<tbody>
		@foreach($listaTTelefono as $item)
			<tr>
				<td>{{$item->tPersona->nombre}} {{$item->tPersona->apellido}}</td>
				<td>{{$item->numero}}</td>
				<td>{{$item->tOperador->nombre}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection