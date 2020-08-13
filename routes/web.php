<?php


Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');



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

//-------------------------------------ENVIOS---------------------------------------------------
Route::get('ensamblador/envios', 'EnviosController@index')->name('mostrar_pedidos');

Route::get('ensamblador/ingresarEnvio/{id}', 'EnviosController@create')->name('ingresar_envio');

Route::post('ensamblador/ingresarEnvio', 'EnviosController@store')->name('crear_envio');

Route::get('ensamblador/editar/{id}', 'EnviosController@edit')->name('editar_envio');

Route::put('ensamblador/editar/{id}', 'EnviosController@update')->name('envio_update');

Route::delete('ensamblador/eliminar/{id}', 'EnviosController@destroy')->name('eliminar_envio');

//-------------------------------------Carrito--------------------------------------------------- 
Route::get('carrito/agregado/{id}', 'carritoController@añadir')->name('carrito.agregar');
Route::get('carrito/show', 'carritoController@show')->name('carrito.show');
Route::get('carrito/eliminar/{id}', 'carritoController@destroy')->name('carrito.borrar');
Route::get('carrito/eliminar/', 'carritoController@destroyAll')->name('carrito.borrarTodo');


//-------------------------------------Pedidos---------------------------------------------------
Route::get('pedidos/pedido/', 'pedidoController@index')->name('pedidos.index'); //mostrar todos
Route::get('pedidos/vistaindividual/', 'pedidoController@indiv')->name('pedidos.indiv'); //mostrar pedidos individuales
Route::get('pedidos/resumen/', 'pedidoController@resumen')->name('pedidos.resumen'); //mostrar pedidos individuales
//-----------------------------Actualizar------------------------------------------------------------
Route::get('pedidos/resumen/{id}', 'pedidoController@edit')->name('pedidos.editar'); //mostrar pedidos individuales
Route::post('pedidos/resumen/{id}', 'pedidoController@update')->name('pedidos.update'); //asigna ensamblador asignado
//-------------------------------------Insertar---------------------------------------------------
Route::post('/pedidos/add_pedido/', 'pedidoController@create')->name('pedidos.add_pedido');
Route::post('/add_pedido', 'pedidoController@store')->name('pedidos.store');

Route::get('pedidos/comprobante/', 'pedidoController@comprobante')->name('pedidos.comprobante'); //mostrar pedidos individuales

Route::get('usuarios/compras/', 'pedidoController@compras')->name('cliente.compras');//vista de cliente a sus compras


Route::get('/evaluacion2', 'pedidoController@vertodo')->name('boleta');
Route::get('descargar-boleta', 'pedidoController@pdf')->name('boleta.pdf');

//-------------------------------------Reviews---------------------------------------------------
Route::get('reviews/review/{id}', 'ReviewController@index')->name('mostrar_review');
Route::get('reviews/ingresar/{id}', 'ReviewController@create')->name('ingresar_review');
Route::post('reviews/ingresar', 'ReviewController@store')->name('crear_review');

Route::get('usuarios/{id}/eliminar', [
    'uses' => 'Auth\RegisterController@eliminar',
    'as' => 'eliminar'
    ]);
Route::get('usuarios/{id}/eliminar1', [
    'uses' => 'Auth\RegisterController@eliminarc',
    'as' => 'eliminarc'
    ]);
Route::get('usuarios/editsc/{id}', [
    'uses' => 'Auth\RegisterController@editsc',
    'as' => 'editsc'
    ]); 
Route::patch('usuarios/editsc/{id}', [
    'uses' => 'Auth\RegisterController@update2',
    'as' => 'update2'
    ]);

Route::get('usuarios/editcliente','ClienteController@create')->name('ingresar');    
Route::post('usuarios/editcliente','ClienteController@Añadir')->name('ingresardatos');
/*
Route::get('/evaluacion2', 'evaluacionController@vertodo')->name('evaluacion');
Route::get('descargar-evaluaciones', 'evaluacionController@pdf')->name('evaluaciones.pdf');

Route::get('/evaluacionp/{academic}', 'evaluacionController@vertodop')->name('evaluacionp');
Route::get('descargar-evaluaciones/{academic}', 'evaluacionController@pdfp')->name('evaluacionesp.pdf');

*/
Auth::routes(['register' => true]);
 