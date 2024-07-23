<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('apikey')->group(function () {
    Route::post('/todo/add', [TaskController::class, 'addTask']);
    Route::post('/todo/status', [TaskController::class, 'updateStatus']);
});