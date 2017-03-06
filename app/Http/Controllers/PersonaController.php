<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Model\TPersona;

class PersonaController extends Controller
{
	public function actionInsertar(Request $request)
	{
		if($_POST)
		{
			$tPersona=new TPersona();

			$tPersona->nombre=$request->input('txtNombre');
			$tPersona->apellido=$request->input('txtApellido');
			$tPersona->correoElectronico=$request->input('txtCorreoElectronico');
			$tPersona->fechaNacimiento=$request->input('dateFechaNacimiento');
			$tPersona->estatura=$request->input('txtEstatura');
			$tPersona->fechaRegistro=date('Y-m-d H:m:s');
			$tPersona->fechaModificacion=date('Y-m-d H:m:s');

			$tPersona->save();

			return redirect('/persona/insertar');
		}

		return view('persona/insertar');
	}

	public function actionVer()
	{
		$listaTPersona=TPersona::all();

		return view('persona/ver', ['listaTPersona' => $listaTPersona]);
	}

	public function actionEliminar($idPersona)
	{
		$tPersona=TPersona::find($idPersona);

		if($tPersona!=null)
		{
			$tPersona->delete();
		}

		return redirect('/persona/ver');
	}

	public function actionVerPorCorreoElectronico($correoElectronico)
	{
		$tPersona=TPersona::whereRaw('correoElectronico=?', [$correoElectronico])->first();

		return view('persona/verporcorreoelectronico', ['tPersona' => $tPersona]);
	}

	public function actionEditar(Request $request, $idPersona=null)
	{
		if($_POST)
		{
			$tPersona=TPersona::find($request->input('hdIdPersona'));

			$tPersona->nombre=$request->input('txtNombre');
			$tPersona->apellido=$request->input('txtApellido');
			$tPersona->correoElectronico=$request->input('txtCorreoElectronico');
			$tPersona->fechaNacimiento=$request->input('dateFechaNacimiento');
			$tPersona->estatura=$request->input('txtEstatura');
			$tPersona->fechaModificacion=date('Y-m-d H:m:s');

			$tPersona->save();

			return redirect('/persona/ver');
		}

		$tPersona=TPersona::find($idPersona);

		if($tPersona==null)
		{
			return redirect('/persona/ver');
		}

		return view('persona/editar', ['tPersona' => $tPersona]);
	}
}
?>