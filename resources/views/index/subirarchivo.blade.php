@extends('layout.template')
@section('cuerpoInterno')
<form action="{{url('index/subirarchivo')}}" method="post" enctype="multipart/form-data">
	<input type="file" id="fileArchivo" name="fileArchivo">
	{{csrf_field()}}
	<input type="submit" value="Subir archivo">
</form>
@endsection