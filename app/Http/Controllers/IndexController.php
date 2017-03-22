<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Factory as FileSystem;
use Illuminate\Contracts\Routing\ResponseFactory as Response;

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

	public function actionExportPdf(Response $response)
	{
		$pdf=app('FPDF');

		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(40, 10, 'Hello World!');
		$pdf->Cell(40, 10, 'Other!');
		$pdf->Cell(40, 10, 'Any more!');
		$pdf->Ln();
		$pdf->Cell(40, 10, 'Kevin Arnold');

		
		$headers=['Content-Type' => 'application/pdf'];

		return $response->make($pdf->Output('I'), 200, $headers);
	}
}

?>