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
    return view('welcome');
});
Route::get('/trainee', 'TraineeController@index');
Route::get('/trainee/create', 'TraineeController@create');
Route::post('/trainee', 'TraineeController@store');
Route::get('/trainee/{trainee}', 'TraineeController@show');
Route::get('/trainee/{trainee}/edit}', 'TraineeController@edit');
Route::put('/trainee/{trainee}', 'TraineeController@update');
Route::delete('/trainee/{trainee}', 'TraineeController@delete');