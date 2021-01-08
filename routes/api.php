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

Route::middleware(['AuthKey'])->group(function () {
    Route::get('trainee', 'TraineeController@index');
    Route::post('trainee', 'TraineeController@store');
    Route::get('trainee/{trainee_id}', 'TraineeController@show');
    Route::put('trainee/{trainee_id}', 'TraineeController@update');
    Route::delete('trainee/{trainee_id}', 'TraineeController@delete');
    Route::get('trainee/{trainee_id}/time', 'TimeController@bymonth');
    Route::post('trainee/{trainee_id}/time', 'TimeController@store');
    Route::put('trainee/{trainee_id}/time/{time_id}', 'TimeController@update');
    Route::put('trainee/{trainee_id}/contracts', 'TimeController@set_contract_dates');
    Route::delete('trainee/{trainee_id}/time/{time_id}', 'TimeController@delete');
});
// Route::post('login', 'LoginController@authenticate');
// Route::get('trainee', 'TraineeController@index')->middleware('AuthKey');
// Route::post('trainee', 'TraineeController@store')->middleware('AuthKey');
// Route::get('trainee/{id}', 'TraineeController@show')->middleware('AuthKey');
// Route::put('trainee/{id}', 'TraineeController@update')->middleware('AuthKey');
// Route::delete('trainee/{id}', 'TraineeController@delete')->middleware('AuthKey');
// Route::get('time/{id}', 'TimeController@index')->middleware('AuthKey');
