<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });

// 無記名関数
Route::prefix('tasks')->controller(TaskController::class)->group(function() {
    Route::get('/index','index')->name('tasks.index');
    Route::get('/create', 'create')->name('tasks.create');
    Route::post('/create', 'store')->name('tasks.store');
    Route::get('/edit/{id}','edit')->name('tasks.edit');
    Route::put('/edit/{id}', 'update')->name('tasks.update');
    Route::put('/change/{id}', 'change')->name('tasks.change');
});