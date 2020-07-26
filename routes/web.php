<?php


Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');

Route::resource('academico','academicController')
    ->names('academics')
    ->parameters(['academico' => 'academic']);

Route::get('/pautaEvaluaciones/{evaluacion}/crearEvaluacion', 'evaluacionController@createEvaluation')->name('evaluaciones.createEvaluation');
Route::patch('/pautaEvaluaciones/promedio', 'evaluacionController@promedio')->name('evaluaciones.promedio');

Route::resource('pautaEvaluaciones','evaluacionController')
    ->names('evaluaciones')
    ->parameters(['pautaEvaluaciones' => 'evaluacion']); 
    
Route::get('/export/{academic}', 'academicController@export')->name('academics.export');

Route::view('/contacto', 'contact')->name('contact');
Route::post('contact','MessageController@store')->name('messages.store');
route::get('/contact/mostrar','MessageController@mostrar')->name('message.mostrar');


//-------------------------------------PRODUCTOS---------------------------------------------------
Route::get('productos/producto', 'ProductoController@index')->name('mostrar_producto');

Route::get('productos/ingresar', 'ProductoController@create')->name('ingresar_producto');

Route::post('productos/ingresar', 'ProductoController@store')->name('crear_producto');

Route::get('productos/editar/{id}', 'ProductoController@edit')->name('editar_producto');

Route::put('productos/editar/{id}', 'ProductoController@update')->name('producto_update');

Route::delete('productos/eliminar/{id}', 'ProductoController@destroy')->name('eliminar_producto');

//-------------------------------------Carrito--------------------------------------------------- 
Route::get('carrito/agregado/{id}', 'carritoController@añadir')->name('carrito.agregar');
Route::get('carrito/show', 'carritoController@show')->name('carrito.show');
Route::get('carrito/eliminar/{id}', 'carritoController@destroy')->name('carrito.borrar');
Route::get('carrito/eliminar/', 'carritoController@destroyAll')->name('carrito.borrarTodo');

//-------------------------------------FACULTADES---------------------------------------------------
Route::get('/facultades/{facultad}/indiv', 'facultadController@indiv')->name('facultades.indiv');
//-----------------------------Insertar------------------------------------------------------------
Route::get('/facultades/add_facultad', 'facultadController@create')->name('facultades.add_facultad');
Route::POST('/add_facultad', 'facultadController@store')->name('facultad.store');
Route::get('/facultades/temporal', 'facultadController@temp')->name('facultades.temporal');
//-----------------------------Mostrar------------------------------------------------------------
Route::get('/facultades/show', 'facultadController@index')->name('facultades.show');
Route::get('/facultades/fuente', 'facultadController@show')->name('facultades.fuente');
//-----------------------------Actualizar------------------------------------------------------------
Route::get('/facultades/{facultad}/editar', 'facultadController@edit')->name('facultades.edit');
Route::patch('/facultades/{facultad}', 'facultadController@update')->name('facultades.update');
//-----------------------------Eliminar-------------------------------------------------------------
Route::delete('/facultades/{facultad}', 'facultadController@destroy')->name('facultades.destroy');
Route::patch('/facultades/{usuario}/usermod', 'facultadController@usermod')->name('facultades.usermod');
//--------------------------------------------------------------------------------------------------



Route::get('usuarios/{id}/eliminar', [
    'uses' => 'Auth\RegisterController@eliminar',
    'as' => 'eliminar'
    ]);

Route::get('/evaluacion2', 'evaluacionController@vertodo')->name('evaluacion');
Route::get('descargar-evaluaciones', 'evaluacionController@pdf')->name('evaluaciones.pdf');

Route::get('/evaluacionp/{academic}', 'evaluacionController@vertodop')->name('evaluacionp');
Route::get('descargar-evaluaciones/{academic}', 'evaluacionController@pdfp')->name('evaluacionesp.pdf');

Auth::routes(['register' => true]);
 


