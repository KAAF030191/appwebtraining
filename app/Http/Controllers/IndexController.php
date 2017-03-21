<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Factory as FileSystem;

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

	public function actionSubirArchivo(FileSystem $fileSystem, Request $request)
	{
		if($_POST)
		{			
			$fileSystem->put('archivo/nombre.mp3', file_get_contents($request->file('fileArchivo')->getRealPath()));

			//Agregar el sesson flash para el mensaje y no olives importar el SessionManager

			return redirect('/index/subirarchivo');
		}

		return view('index/subirarchivo');
	}

	public function actionDescargarArchivo(FileSystem $fileSystem)
	{
		$file_path=storage_path('app/archivo/nombre.mp3');

		return response()->download($file_path);
	}

	public function actionObtenerHoraConAjax()
	{
		$horaActual=date('H:m:s');

		return ['horaActual' => $horaActual];
	}
}

?>