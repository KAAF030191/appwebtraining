<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Model\TTelefono;

class TelefonoController extends Controller
{
	public function actionVer()
	{
		$listaTTelefono=TTelefono::with(['TPersona', 'TOperador'])->get();

		return view('telefono/ver', ['listaTTelefono' => $listaTTelefono]);
	}
}
?>