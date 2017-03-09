<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

use DB;

use App\Model\TPersona;

class PersonaController extends Controller
{
	public function actionInsertar(Request $request, SessionManager $sessionManager)
	{
		if($_POST)
		{
			$tPersona=TPersona::whereRaw('correoElectronico=?', [trim($request->input('txtCorreoElectronico'))])->first();

			if($tPersona!=null)
			{
				$sessionManager->flash('mensajeGeneral', 'El correo electrónico ya existe.');
				$sessionManager->flash('color', env('COLOR_ERROR'));

				return redirect('/persona/insertar');
			}

			$tPersona=new TPersona();

			$tPersona->nombre=$request->input('txtNombre');
			$tPersona->apellido=$request->input('txtApellido');
			$tPersona->correoElectronico=$request->input('txtCorreoElectronico');
			$tPersona->fechaNacimiento=$request->input('dateFechaNacimiento');
			$tPersona->estatura=$request->input('txtEstatura');
			$tPersona->fechaRegistro=date('Y-m-d H:m:s');
			$tPersona->fechaModificacion=date('Y-m-d H:m:s');

			$tPersona->save();

			$sessionManager->flash('mensajeGeneral', 'Persona registrada correctamente.');
			$sessionManager->flash('color', env('COLOR_CORRECTO'));

			return redirect('/persona/insertar');
		}

		return view('persona/insertar');
	}

	public function actionVer()
	{
		$listaTPersona=TPersona::with(['TTelefono.TOperador'])->get();

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
			$tPersona=TPersona::whereRaw('idPersona!=? and correoElectronico=?', [$request->input('hdIdPersona'), trim($request->input('txtCorreoElectronico'))])->first();

			if($tPersona!=null)
			{
				return redirect('/persona/editar/'.$request->input('hdIdPersona'));
			}

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

	public function actionLogIn(Request $request, SessionManager $sessionManager)
	{
		$tPersona=TPersona::whereRaw('correoElectronico=?', [$request->input('txtCorreoElectronicoLogIn')])->first();

		if($tPersona==null)
		{
			$sessionManager->flash('mensajeGeneral', 'Datos incorrectos.');
			$sessionManager->flash('color', env('COLOR_ERROR'));

			return redirect('/');
		}

		$sessionManager->put('idPersona', $tPersona->idPersona);
		$sessionManager->put('correoElectronico', $tPersona->correoElectronico);

		$sessionManager->flash('mensajeGeneral', 'Bienvenido(a).');
		$sessionManager->flash('color', env('COLOR_CORRECTO'));

		return redirect('/');
	}

	public function actionLogOut(SessionManager $sessionManager)
	{
		$sessionManager->flush();

		return redirect('/');
	}
}
?>