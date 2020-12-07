<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'LoginController@authenticate');
Route::get('trainee', 'TraineeController@index')->middleware('AuthKey');
Route::post('trainee', 'TraineeController@store')->middleware('AuthKey');
Route::get('trainee/{trainee}', 'TraineeController@show')->middleware('AuthKey');
Route::put('trainee/{trainee}', 'TraineeController@update')->middleware('AuthKey');
Route::delete('trainee/{trainee}', 'TraineeController@delete')->middleware('AuthKey');
// Route::get('trainee', 'TraineeController@index');
// Route::post('trainee', 'TraineeController@store');
// Route::get('trainee/{trainee}', 'TraineeController@show');
// Route::put('trainee/{trainee}', 'TraineeController@update');
// Route::delete('trainee/{trainee}', 'TraineeController@delete');
