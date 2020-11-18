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

Route::get('trainee', 'TraineeController@index');
//Route::get('trainee/create', 'TraineeController@create');
Route::post('trainee', 'TraineeController@store');
Route::get('trainee/{trainees}', 'TraineeController@show');
//Route::get('trainee/{trainees}/edit}', 'TraineeController@edit');
Route::put('trainee/{trainees}', 'TraineeController@update');
Route::delete('trainee/{trainees}', 'TraineeController@delete');