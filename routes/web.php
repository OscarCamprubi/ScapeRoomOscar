<?php

use App\Http\Controllers\JocController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValoracioController;

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


//******************************JOC**********************************//
Route::get('list-joc', [JocController::class, 'list']);
Route::get('show-joc/{jocID}', [JocController::class, 'show']);
Route::get('create-joc', [JocController::class, 'create']);
Route::post('save-joc', [JocController::class, 'save']);
Route::get('edit-joc/{jocID}', [JocController::class, 'edit']);
Route::post('update-joc', [JocController::class, 'update']);
Route::get('delete-joc/{jocID}', [JocController::class, 'delete']);

//******************************SALA**********************************//
Route::get('list-sala', [SalaController::class, 'list']);
Route::get('create-sala', [SalaController::class, 'create']);
Route::post('save-sala', [SalaController::class, 'save']);
Route::get('edit-sala/{salaID}', [SalaController::class, 'edit']);
Route::post('update-sala', [SalaController::class, 'update']);
Route::get('delete-sala/{salaID}', [SalaController::class, 'delete']);

//******************************PARTICIPANT**********************************//
Route::get('list-participant', [ParticipantController::class, 'list']);
Route::get('create-participant', [ParticipantController::class, 'create']);
Route::post('save-participant', [ParticipantController::class, 'save']);
Route::get('edit-participant/{participantID}', [ParticipantController::class, 'edit']);
Route::post('update-participant', [ParticipantController::class, 'update']);
Route::get('delete-participant/{participantID}', [ParticipantController::class, 'delete']);

//******************************VOUCHER**********************************//
Route::get('list-voucher', [VoucherController::class, 'list']);
Route::get('create-voucher', [VoucherController::class, 'create']);
Route::post('save-voucher', [VoucherController::class, 'save']);
Route::get('edit-voucher/{voucherID}', [VoucherController::class, 'edit']);
Route::post('update-voucher', [VoucherController::class, 'update']);
Route::get('delete-voucher/{voucherID}', [VoucherController::class, 'delete']);


//******************************ROL**********************************//
Route::get('list-rol', [RolController::class, 'list']);
Route::get('create-rol', [RolController::class, 'create']);
Route::post('save-rol', [RolController::class, 'save']);
Route::get('edit-rol/{rolID}', [RolController::class, 'edit']);
Route::post('update-rol', [RolController::class, 'update']);
Route::get('delete-rol/{rolID}', [RolController::class, 'delete']);

//******************************USER**********************************//
Route::get('list-user', [UserController::class, 'list']);
Route::get('show-user/{userID}', [UserController::class, 'show']);
Route::get('create-user', [UserController::class, 'create']);
Route::post('save-user', [UserController::class, 'save']);
Route::get('edit-user/{userID}', [UserController::class, 'edit']);
Route::post('update-user', [UserController::class, 'update']);
Route::get('delete-user/{userID}', [UserController::class, 'delete']);

//******************************VALORACIO**********************************//
Route::get('list-valoracio', [ValoracioController::class, 'list']);
Route::get('create-valoracio', [ValoracioController::class, 'create']);
Route::post('save-valoracio', [ValoracioController::class, 'save']);
Route::get('edit-valoracio/{valoracioID}', [ValoracioController::class, 'edit']);
Route::post('update-valoracio', [ValoracioController::class, 'update']);
Route::get('delete-valoracio/{valoracioID}', [ValoracioController::class, 'delete']);
