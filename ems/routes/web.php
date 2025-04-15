<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\JobController;

// Home route for the HR Dashboard
Route::get('/', function () {
    return view('hrdashboard');
})->name('hrdashboard')->middleware('auth:admin');


Route::get('/employeedashboard/{employee}', function ($employee) {
    return view('employeedashboard',compact('employee'));
})->name('employeedashboard')->middleware('auth:employee');

// Registration and employee management routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/{Hrdata}', [RegisterController::class, 'test'])->name('hrdashboard');


Route::get('/employeelist/{T}', [RegisterController::class, 'showEmployeeList'])->name('employeelist');
Route::get('/employee/{id}', [RegisterController::class, 'edit'])->name('editing');
Route::post('/employee/{id}', [RegisterController::class, 'update']);
Route::get('/delete/{id}', [RegisterController::class, 'delete'])->name('delete');


// Authentication routes
Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminLoginController::class, 'login']);
Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

//job
// Show upload form
Route::get('/admin/post-job', [JobController::class, 'showForm'])->name('job.form')->middleware('auth:admin');

// Handle job post
Route::post('/admin/post-job', [JobController::class, 'upload'])->name('job.upload')->middleware('auth:admin');