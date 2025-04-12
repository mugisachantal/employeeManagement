<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('hrdashboard');
})->name('hrdashboard')->middleware('auth:admin');

// Example routes for registration and login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/employeelist/{T}', [RegisterController::class, 'showEmployeeList'])->name('employeelist');
Route::get('/employee/{id}', [RegisterController::class, 'edit'])->name('editing');
Route::post('/employee/{id}', [RegisterController::class, 'update']);

// Login routes
Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminLoginController::class, 'login']);
