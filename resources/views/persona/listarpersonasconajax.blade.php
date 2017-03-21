<table border="1">
	<thead>
		<tr>
			<th>Nombre completo</th>
			<th>Correo</th>
		</tr>
	</thead>
	<tbody>
		@foreach($listaTPersona as $item)
			<tr>
				<td>{{$item->nombre}} {{$item->apellido}}</td>
				<td>{{$item->correoElectronico}}</td>
			</tr>
		@endforeach
	</tbody>
</table>