<?php
Route::get('/', 'IndexController@actionIndex');
Route::post('/index/index', 'IndexController@actionIndex');
Route::get('/index/parametrourl/{codigoEstudiante?}', 'IndexController@actionParametroUrl');
Route::match(['get', 'post'], '/index/subirarchivo', 'IndexController@actionSubirArchivo');
Route::get('/index/descargararchivo', 'IndexController@actionDescargarArchivo');
Route::post('/index/obtenerhoraconajax', 'IndexController@actionObtenerHoraConAjax');
Route::get('/index/exportpdf', 'IndexController@actionExportPdf');

Route::get('/index/exportexcel', function()
{
	$nombreTemporal='Texto cualquiera';

	Excel::create('Laravel Excel', function($excel) use($nombreTemporal)
	{
	    $excel->sheet('Excel sheet', function($sheet) use($nombreTemporal)
	    {
	        $sheet->setOrientation('landscape');

	        $sheet->cell('C4', function($cell)
	        {
			    $cell->setValue('codideep.com');
			});

			$sheet->cell('C5', function($cell) use($nombreTemporal)
	        {
			    $cell->setValue($nombreTemporal);
			});

			$sheet->fromArray([1, 2, 3, 4, 5, 6, 7], null, 'A1', true);

			$sheet->mergeCells('H2:J4');

			$sheet->cell('H2', function($cell)
	        {
			    $cell->setValue('Clases de desarrollo');
			    $cell->setAlignment('center');
			    $cell->setValignment('center');
			});
	    });
	})->export('xls');
});

/*Rutas persona*/
Route::match(['get', 'post'], '/persona/insertar', 'PersonaController@actionInsertar');
Route::get('/persona/ver', 'PersonaController@actionVer');
Route::get('/persona/eliminar/{idPersona}', 'PersonaController@actionEliminar');
Route::get('/persona/verporcorreoelectronico/{correoElectronico}', 'PersonaController@actionVerPorCorreoElectronico');
Route::get('/persona/editar/{idPersona}', 'PersonaController@actionEditar');
Route::post('/persona/editar', 'PersonaController@actionEditar');
Route::post('/persona/login', 'PersonaController@actionLogIn');
Route::get('/persona/logout', 'PersonaController@actionLogOut');
Route::post('/persona/listarpersonasconajax', 'PersonaController@actionListarPersonasConAjax');

/*Rutas teléfono*/
Route::get('/telefono/ver', 'TelefonoController@actionVer');
?>