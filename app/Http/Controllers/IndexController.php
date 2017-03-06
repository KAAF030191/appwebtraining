<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function actionIndex(Request $request)
	{
		if($_POST)
		{
			$nombrePersona=$request->input('txtNombre');
			$apellidoPersona=$request->input('txtApellido');

			$nombrePersona.='...';
			$apellidoPersona.='...';

			return view('index/index', ['nombre' => $nombrePersona, 'apellido' => $apellidoPersona]);
		}

		return view('index/index');
	}

	public function actionParametroUrl($codigoEstudiante=null)
	{
		return view('index/parametrourl', ['codigoEstudiante' => $codigoEstudiante]);
	}
}

?>