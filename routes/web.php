<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get("/",[PagesController::class,'index'])->name('home');

Route::get('create',[PagesController::class, 'create'])->name('create');

Route::put('store',[TaskController::class,'store'])->name('store.task');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']) ->name('tasks.edit');

Route::put('/tasks/{id}', [TaskController::class, 'update'])
    ->name('update.task');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']) ->name('tasks.destroy');

 Route::get('/tasks/{id}', [TaskController::class, 'show'])  ->name('tasks.show');