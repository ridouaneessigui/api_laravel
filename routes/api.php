<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ClientController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::get('list',[UserController::class,'list']);


Route::post('addprojet',[ProjetController::class,'addprojet']);
Route::post('listp',[ProjetController::class,'listp']);
Route::delete('delete/{id}',[ProjetController::class,'delete']);
Route::get('projet/{id}',[ProjetController::class,'getProjet']);
Route::get('searchp/{Key}',[ProjetController::class,'searchp']);
Route::put('updateProjet/{id}',[ProjetController::class,'updateProjet']);


Route::post('ajouabsence',[AbsenceController::class,'ajouabsence']);
Route::post('lista',[AbsenceController::class,'lista']);
Route::delete('deletea/{id}',[AbsenceController::class,'deletea']);
Route::get('getAbsence/{id}',[AbsenceController::class,'getAbsence']);


Route::post('ajounotes',[NotesController::class,'ajounotes']);
Route::post('listn',[NotesController::class,'listn']);
Route::delete('deleten/{id}',[NotesController::class,'deleten']);
Route::get('getNotes/{id}',[NotesController::class,'getNotes']);