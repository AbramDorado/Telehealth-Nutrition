<?php

use App\Http\Controllers\FingerDevicesControlller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\JitsiController;
///////////////////////////////////////////////////////////
use App\Http\Controllers\PatientInformationController;
use App\Http\Controllers\SoapController;
use App\Http\Controllers\LabRequestController;
use App\Http\Controllers\DietHistoryController;
use App\Http\Controllers\PcwmController;
///////////////////////////////////////////////////////////

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
})->name('welcome');
Route::get('attended/{user_id}', '\App\Http\Controllers\AttendanceController@attended' )->name('attended');
Route::get('attended-before/{user_id}', '\App\Http\Controllers\AttendanceController@attendedBefore' )->name('attendedBefore');
Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['admin']], function () {

    Route::get('/admin', '\App\Http\Controllers\AdminController@index')->name('admin');
});

///////////////////////////////////////////////////////////
Route::get('/nutritionforms', function(){
    return view('includes/nutritionforms');
});

Route::get('/patientinformation', function () {
    return view('patientinformation');
});

Route::get('/soap', function(){
    return view('soap');
});

Route::get('/labrequest', function(){
    return view('labrequest');
});

Route::get('/diethistory', function(){
    return view('diethistory');
});

Route::get('/pcwm', function(){
    return view('pcwm');
});
///////////////////////////////////////////////////////////

Route::get('/users', function(){
    return view('users');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/store_user', [UserController::class, 'store'])->name('store_user');
Route::put('/update_user/{id}', [UserController::class, 'updateUser'])->name('update_user');

Route::delete('/delete-user/{id}', '\App\Http\Controllers\UserController@deleteUser')->name('delete_user');


///////////////////////////////////////////////////////////
Route::get('/nutritionforms', '\App\Http\Controllers\FormController@index')->name('includes/nutritionforms');
Route::get('/nutritionforms/{patient_number}/view', [FormController::class, 'viewMedicalRecord'])->name('view_nutritionforms');
Route::post('/nutritionforms/{patient_number}/archive', [FormController::class, 'archive'])->name('archive_nutritionforms');
Route::patch('/unarchive_nutritionforms/{patient_number}', [FormController::class,'unarchive'])->name('unarchive_nutritionforms');

Route::get('/patientinformation/{patient_number}', [PatientInformationController::class, 'index'])->name('patientinformation');
Route::post('/patientinformation/{patient_number}', [PatientInformationController::class, 'store'])->name('store_patientinformation');

Route::get('/soap/{patient_number}', [SoapController::class, 'index'])->name('soap');
Route::post('/soap/{patient_number}', [SoapController::class, 'store'])->name('store_soap');
Route::get('/soap/edit/{log_id}', [SoapController::class, 'update_form'])->name('update_form');
Route::post('/soap/edit/{log_id}', [SoapController::class, 'update'])->name('update_soap');

Route::get('/labrequest/{patient_number}', [LabRequestController::class, 'index'])->name('labrequest');
Route::post('/labrequest/{patient_number}', [LabRequestController::class, 'store'])->name('store_labrequest'); 

Route::get('/diethistory/{patient_number}', [DietHistoryController::class, 'index'])->name('diethistory');
Route::post('/diethistory/{patient_number}', [DietHistoryController::class, 'store'])->name('store_diethistory');

Route::get('/pcwm/{patient_number}', [PcwmController::class, 'index'])->name('pcwm');
Route::post('/pcwm/{patient_number}', [PcwmController::class, 'store'])->name('store_pcwm');

Route::get('/download-pdf/{patient_number}', [PdfController::class, 'download'])->name('download-pdf');
Route::get('/download-lab-req-pdf/{patient_number}', [PdfController::class, 'labreq_download'])->name('download-lab-req-pdf');
///////////////////////////////////////////////////////////

Route::get('/jitsi-meeting', [JitsiController::class, 'createRoom']);

Route::group(['middleware' => ['auth']], function () {

});
