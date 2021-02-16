<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('rols', RolController::class)
    ->middleware(['auth']);

Route::resource('employees', EmployeeController::class)
    ->middleware(['auth']);

Route::resource('permissions', PermissionController::class)
    ->middleware(['auth']);

require __DIR__ . '/auth.php';
