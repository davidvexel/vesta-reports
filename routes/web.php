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

Route::get(
    '/', function () {
        return view('welcome');
    }
);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/home', 'ReservationController');
	Route::resource('/reservations', 'ReservationController');
	Route::resource('/reports', 'ReportController');
	Route::get('/import-report', 'ReportController@importReportForm');
	Route::post('/import-report', 'ReportController@processReport');
	Route::get('/clients', 'UserController@getClients');
	Route::get('/clients/create', 'UserController@createClient');
	Route::get('/administrators', 'UserController@getAdmins');
	Route::post('/users/create', 'UserController@store');
});
