<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('task')->controller(TaskController::class)->group(function()){
    Route::get('/index','index')->name('tasks.index');
    Route::get('/edit','edit')->name('tasks.edit')
}