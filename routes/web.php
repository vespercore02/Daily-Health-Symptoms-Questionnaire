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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//Auth::routes(['register' => false]);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@show')->middleware('adminonly');
Route::post('register', 'Auth\RegisterController@store');
Route::get('accounts','Auth\RegisterController@list');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('employees', 'EmployeesController@index');
Route::post('employees', 'EmployeesController@login');
Route::post('employees/form', 'EmployeesController@store');
Route::get('employees/generate', 'EmployeesController@generate');
Route::get('employees/list', 'EmployeesController@list')->middleware('auth');
Route::post('employees/list', 'EmployeesController@search')->middleware('auth');
Route::get('employees/view/{id}', 'EmployeesController@view')->middleware('auth');
Route::get('employees/report', 'EmployeesController@report')->middleware('auth');
Route::get('monitor', 'EmployeesController@monitor')->middleware('auth');

Route::get('visitors', 'VisitorsController@show');
Route::post('visitors', 'VisitorsController@store');

Route::get('results/{result}', 'ResultsController@show');

Route::get('test', function () {
    event(new App\Events\NewMessage('Welcome yeah'));
    return "Event has been sent!";
});