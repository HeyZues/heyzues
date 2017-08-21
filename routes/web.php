<?php

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
// vistas
Route::get('empleados', 'EmployesController@empleados');
Route::get('empleado/{id?}', 'EmployesController@showView');
// REST
Route::get('employe/{id?}', 'EmployesController@index');
Route::post('employe/', 'EmployesController@store');
Route::post('employe/{id}', 'EmployesController@update');
Route::delete('employe/{id}', 'EmployesController@destroy');

/*Acceso*/
Route::any('auth/register', 'UserController@register');
Route::any('auth/login', 'UserController@login');
Route::any('auth/authenticate', 'UserController@authenticate');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
});



Route::get('home', function() {
    return redirect('/');
});

