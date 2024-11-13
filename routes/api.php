<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('property/amlak',[\App\Http\Controllers\PropertyController::class,'property']);
Route::post('admin/amlak',[\App\Http\Controllers\AdminController::class,'admin']);
Route::get('property/list',[\App\Http\Controllers\PropertyController::class,'showlist']);
Route::get('property/{property:id}/show',[\App\Http\Controllers\PropertyController::class,'show']);
Route::put('property/{property}/update',[\App\Http\Controllers\PropertyController::class,'update']);
Route::delete('property/{property}/delete',[\App\Http\Controllers\PropertyController::class,'delete']);
