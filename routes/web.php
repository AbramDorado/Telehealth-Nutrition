<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FingerDevicesControlller;

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

Route::get('/initialresuscitation', function(){
    return view('initialresuscitation');
});

Route::get('/outcome', function(){
    return view('outcome');
});

Route::get('/evaluation', function(){
    return view('evaluation');
});

Route::post('/store_evaluation', '\App\Http\Controllers\EvaluationController@store')->name('store_evaluation');
Route::post('/store_outcome', '\App\Http\Controllers\OutcomeController@store')->name('store_outcome');


Route::post('/first-ventilation-dt', '\App\Http\Controllers\InitialResuscitationController@firstVenitlationDT');
Route::post('/intubation-dt', '\App\Http\Controllers\InitialResuscitationController@intubationDT');
Route::post('/first-pulseless-rhythm-dt', '\App\Http\Controllers\InitialResuscitationController@firstPulselessRhythmDT');
Route::post('/compressions-dt', '\App\Http\Controllers\InitialResuscitationController@compressionsDT');
Route::post('/aed-applied-dt', '\App\Http\Controllers\InitialResuscitationController@aedAppliedDT');
Route::post('/pacemaker-on-dt', '\App\Http\Controllers\InitialResuscitationController@pacemakerOnDT');

Route::group(['middleware' => ['auth']], function () {

});
