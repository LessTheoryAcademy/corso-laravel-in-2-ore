<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/hello/{param}/{param2}', function ($param, $param2) {
    return 'Hello world!!! Param : ' . $param . ' Param2 : ' . $param2;
});

Route::get('/hello-view/{param}', function ($param) {

    $model = [
        'param1' => $param,
        'param2' => 'world',
    ];

    return view('hello-view', $model);
});

Route::get('/hello-controller/{param1}/{param2}', 'MyFirstController@index');

Route::get('/hello-controller-query-string', 'MyFirstController@indexWithQueryString');

//Route::get('photos', 'Admin\PhotoController@index');
//Route::post('photos', 'Admin\PhotoController@store');

//Route::resource('photos', 'Admin\PhotoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {

    Route::resource('photos', 'PhotoController');
   
});
