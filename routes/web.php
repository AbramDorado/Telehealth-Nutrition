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

    Route::get('/codeblueforms', function(){
        return view('includes/codeblueforms');
    });

    Route::get('/initialresuscitation', function(){
        return view('initialresuscitation');
    });
    

});

Route::group(['middleware' => ['auth']], function () {

});
