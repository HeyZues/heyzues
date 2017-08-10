<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    //return view('welcome');
	return 'hola oso!';
});

Route::get('prueba/{id}', function () {
	$foobar = ['foo' => 0, 'bar' => 'baz'];
	return response()->json($foobar)
	->header('Content-Type', 'application/json');                  
});

Route::any('operador', function() {
    $user['bernard'] = 8;
    $user['mark'] = 9;
	return response()->json($user['bernard'] <=> $user['mark']);               
});

//declare(strict_types=1);
Route::any('fusion/{id}', function(int $id) {
	return $id + 5;
});

//accediendo aun metodo en especifico
Route::get('controlador', 'Organizaciones@index');

Route::any('operador', function(){
    $user['bernard'] = 8;
    $user['mark'] = 9;
	return response()->json($user['bernard'] <=> $user['mark']);               
});
*/
//Route::get('/', function () {   return view('examples/home'); });
//controladorRESFUL
Route::resource('unidades', 'Unit_organController');
Route::resource('sales', 'Sales_organController');
Route::resource('org', 'Organizaciones');
//Route::resource('emp', 'EmployesController');

/*Ejemplos*/
Route::get('/', 'Dashboard@index');
Route::get('tabs', 'Dashboard@tabs');
Route::get('toggle', 'Dashboard@toggle');
Route::get('forms', 'Dashboard@forms');
Route::get('accordion', 'Dashboard@accordion');
Route::get('touch', 'Dashboard@touch');
Route::get('drag', 'Dashboard@drag');
Route::get('overlay', 'Dashboard@overlay');

/*Empleados*/
Route::get('empleados', 'Dashboard@empleados');
Route::get('nuevo_emp', 'EmployesController@showView');




Route::get('employe/{id?}', 'EmployesController@index');
Route::post('employe/', 'EmployesController@store');
Route::post('employe/{id}', 'EmployesController@update');
Route::delete('employe/{id}', 'EmployesController@destroy');

Route::get('home', function() {
    return redirect('/');
});

