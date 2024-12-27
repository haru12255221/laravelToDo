<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// 無記名関数
Route::prefix('task')->controller(TaskController::class)->group(function() {
    Route::get('/create', 'create')->name('tasks.create');
    Route::post('/create', 'store')->name('tasks.store');
    Route::get('/index','index')->name('tasks.index');
    Route::get('/edit','edit')->name('tasks.edit');
    Route::put('/edit/{id}', 'update')->name('tasks.update');
});