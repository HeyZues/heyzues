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
*/
Route::get('/', function () {
    return view('index');
});
//controladorRESFUL
Route::resource('unidades', 'Unit_organController');
Route::resource('sales', 'Sales_organController');
Route::resource('org', 'Organizaciones');

Route::get('/api/v1/employees/{id?}', 'EmployesController@index');
Route::post('/api/v1/employees', 'EmployesController@store');
Route::post('/api/v1/employees/{id}', 'EmployesController@update');
Route::delete('/api/v1/employees/{id}', 'EmployesController@destroy');

Route::get('home', function() {
    return redirect('/');
});
