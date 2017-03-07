<?php
Route::get('/', 'IndexController@actionIndex');
Route::post('/index/index', 'IndexController@actionIndex');
Route::get('/index/parametrourl/{codigoEstudiante?}', 'IndexController@actionParametroUrl');

/*Rutas persona*/
Route::match(['get', 'post'], '/persona/insertar', 'PersonaController@actionInsertar');
Route::get('/persona/ver', 'PersonaController@actionVer');
Route::get('/persona/eliminar/{idPersona}', 'PersonaController@actionEliminar');
Route::get('/persona/verporcorreoelectronico/{correoElectronico}', 'PersonaController@actionVerPorCorreoElectronico');
Route::get('/persona/editar/{idPersona}', 'PersonaController@actionEditar');
Route::post('/persona/editar', 'PersonaController@actionEditar');

/*Rutas teléfono*/
Route::get('/telefono/ver', 'TelefonoController@actionVer');
?>