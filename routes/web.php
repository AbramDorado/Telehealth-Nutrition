<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FingerDevicesControlller;
use App\Http\Controllers\CodeTeamController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('attended/{user_id}', '\App\Http\Controllers\AttendanceController@attended' )->name('attended');
Route::get('attended-before/{user_id}', '\App\Http\Controllers\AttendanceController@attendedBefore' )->name('attendedBefore');
Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['admin']], function () {

    Route::get('/admin', '\App\Http\Controllers\AdminController@index')->name('admin');
});

Route::get('/codeblueforms', function(){
    return view('includes/codeblueforms');
});

Route::get('/maininformation', function () {
    return view('maininformation');
});

Route::get('/initialresuscitation', function(){
    return view('initialresuscitation');
});

Route::get('/flowsheet', function(){
    return view('flowsheet');
});

Route::get('/outcome', function(){
    return view('outcome');
});

Route::get('/evaluation', function(){
    return view('evaluation');
});

Route::get('/codeteam', function(){
    return view('codeteam');
});

Route::get('/codeteam', [CodeTeamController::class, 'showCodeTeamForm']);

Route::get('/maininformationview', '\App\Http\Controllers\MainInformationController@index')->name('maininformationview');

Route::post('/store_maininformation', '\App\Http\Controllers\MainInformationController@store')->name('store_maininformation');
Route::post('/store_initialresuscitation', '\App\Http\Controllers\InitialResuscitationController@store')->name('store_initialresuscitation');
Route::post('/store_flowsheet', '\App\Http\Controllers\FlowsheetController@store')->name('store_flowsheet');
Route::post('/store_evaluation', '\App\Http\Controllers\EvaluationController@store')->name('store_evaluation');
Route::post('/store_outcome', '\App\Http\Controllers\OutcomeController@store')->name('store_outcome');
Route::post('/store_codeteam', '\App\Http\Controllers\CodeTeamController@store')->name('store_codeteam');
 

Route::group(['middleware' => ['auth']], function () {

});
