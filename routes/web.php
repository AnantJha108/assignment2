<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['LoginAuth'])->group(function () {
    Route::get("/", [HomeController::class, "index"])->name("homepage");
});

Route::match(["get", "post"], "/login", [AuthController::class, "login"])->name("login");
Route::match(["get", "post"], "/register", [AuthController::class, "register"])->name("register");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
