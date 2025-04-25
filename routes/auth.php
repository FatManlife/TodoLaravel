<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authentificate;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginView'])->name("login.view");
Route::post('/login', [AuthController::class, 'authUser'])->name("login.action");

Route::get("/register", [AuthController::class, 'registerView'])->name("register.view");
Route::post("/register", [AuthController::class, "createUser"])->name("register.action");

Route::post("/logout", [AuthController::class, "logout"])->name("logout.action");
