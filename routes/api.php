<?php

use App\Http\Controllers\ClassificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/competitor', [App\Http\Controllers\CompetitorController::class, 'index']);
Route::get('/trainer', [App\Http\Controllers\TrainerController::class, 'index']);
Route::get('/location', [App\Http\Controllers\LocationController::class, 'index']);
Route::get('/modality', [App\Http\Controllers\ModalityController::class, 'index']);
Route::get('/classification', [App\Http\Controllers\ClassificationController::class, 'index']);

