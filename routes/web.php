<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Developer\TaskController as DeveloperTaskController;
use App\Http\Controllers\Manager\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->prefix('admin')->group(function () {
        
        Route::resource('projects', ProjectController::class);
    });

    Route::middleware('role:manager')->prefix('manager')->group(function () {
        Route::resource('tasks', TaskController::class);
    });

    Route::middleware('role:developer')->prefix('developer')->group(function () {
        Route::get('tasks', [DeveloperTaskController::class, 'index']);
        Route::patch('tasks/{task}', [DeveloperTaskController::class, 'updateStatus']);
    });
});


require __DIR__.'/auth.php';
