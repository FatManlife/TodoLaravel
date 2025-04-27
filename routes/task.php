<?php

use App\Http\Controllers\TaskController;
use App\Http\Middleware\Authentificate;
use App\Http\Middleware\TaskOwnership;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "/tasks");

//Views
Route::get("/tasks", [TaskController::class, "index"])->name("task.index.view");
Route::get("/tasks/create", [TaskController::class, "create"])->name("task.create.view");
Route::get("/tasks/{id}", [TaskController::class, "show"])->name("task.show.view");
Route::get("/tasks/{id}/edit", [TaskController::class, "edit"])->name("task.edit.view")->middleware(TaskOwnership::class);

//Actions
Route::middleware(Authentificate::class)->group(function () {
    Route::post("/tasks/create", [TaskController::class, "store"])->name("task.create.action");
    Route::middleware(TaskOwnership::class)->group(function () {
        Route::put("/tasks/{id}/edit", [TaskController::class, "update"])->name("task.edit.action");
        Route::delete("/tasks/{id}/destroy", [TaskController::class, "destroy"])->name("task.delete.action");
    });
});
