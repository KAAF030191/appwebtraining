@extends('layout.template')
@section('cuerpoInterno')
<b>Nombre: </b>{{$tPersona->nombre}}
<br>
<b>Apellido: </b>{{$tPersona->apellido}}
<br>
<b>Correo electrónico: </b>{{$tPersona->correoElectronico}}
@endsection