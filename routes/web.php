<?php
Route::get('/', 'IndexController@actionIndex');
Route::post('/index/index', 'IndexController@actionIndex');
Route::get('/index/parametrourl/{codigoEstudiante?}', 'IndexController@actionParametroUrl');
Route::match(['get', 'post'], '/index/subirarchivo', 'IndexController@actionSubirArchivo');
Route::get('/index/descargararchivo', 'IndexController@actionDescargarArchivo');
Route::post('/index/obtenerhoraconajax', 'IndexController@actionObtenerHoraConAjax');
Route::get('/index/exportpdf', 'IndexController@actionExportPdf');

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