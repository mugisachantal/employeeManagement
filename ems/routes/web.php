<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RegisterController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('hrdashboard') ;
})->name('hrdashboard');
// Route::get('/employee/register', [EmployeeController::class, 'create'])->name('register.employee');
// Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::get('/policy/update', [PolicyController::class, 'index'])->name('policy.update');
// Route::get('/jobs/post', [JobController::class, 'create'])->name('jobs.post');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Example route for the dashboard (you'll need to create this controller and view)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('auth'); // Example: Requires authentication
Route::get('/employeelist', [RegisterController::class, 'showEmployeeList'])->name('employeelist');