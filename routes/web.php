<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

Route::get('/',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/myAppointments',[HomeController::class, 'myAppoints']);
Route::get('/cancel_appointment/{id}',[HomeController::class, 'cancel_appoint']);
Route::post('/appointment',[HomeController::class, 'docappointment']);

Route::get('/add_doc_view',[AdminController::class, 'add_doc_view']);
Route::get('/statusApp',[AdminController::class, 'statusApp']);
Route::get('/cancelled/{id}',[AdminController::class, 'cancelSt']);
Route::get('/approved/{id}',[AdminController::class, 'approveSt']);

Route::get('/sendemailview/{id}',[AdminController::class, 'sendemailview']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);
Route::get('/deleteAppointment/{id}',[AdminController::class, 'deleteAppoint']);
Route::get('/showDoc',[AdminController::class, 'showDoc']);
Route::get('/deleteDoc/{id}',[AdminController::class, 'deleteDoc']);
Route::get('/updateDoc/{id}',[AdminController::class, 'updateDoc']);
Route::post('/editDoc/{id}',[AdminController::class, 'editDoc']);
Route::post('/upload_doc',[AdminController::class, 'upload_doc_data']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
