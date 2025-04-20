
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController; 
use App\Mail\CVUploaded; 
use Illuminate\Support\Facades\Mail; 


// Admin protected routes
Route::middleware(['auth:admin'])->group(function () {
 
});


// Employee protected routes
Route::middleware(['auth:employee'])->group(function () {
    // Employee Dashboard Route
Route::get('/edashboard/{employee}', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
});


// Route::get('/', function () {
//     return view('index');
// })->name('index');
//salary tracking route and 
  Route::get('/', [SalaryController::class, 'Paymentcheck'])->name('index');
  Route::post('/paymentconfirmation/{email}', [SalaryController::class, 'paymentConfirmation'])->name('payment.confirmation')->middleware('auth:employeee');;
  // Job posting routes
  Route::get('/admin/post-job', [JobController::class, 'showForm'])->name('job.form') ->middleware('auth:admin');
  Route::post('/admin/post-job', [JobController::class, 'upload'])->name('job.upload')->middleware('auth:admin');
  
  // employee profile  management routes
  Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register') ->middleware('auth:admin');;
  Route::post('/register', [RegisterController::class, 'register']);
  Route::get('/hrdashboard/{Hr}', [RegisterController::class, 'test'])->name('hrdashboard');
  Route::get('/employeelist/{T}', [RegisterController::class, 'showEmployeeList'])->name('employeelist');
  Route::get('/employee/{id}', [RegisterController::class, 'edit'])->name('editing');
  Route::post('/employee/{id}/{flag}', [RegisterController::class, 'update'])->name('update');
  Route::get('/delete/{id}', [RegisterController::class, 'delete'])->name('delete');
  Route::post('/adminprofileupdate', [RegisterController::class, 'adminUpdate'])->name('Admin.profile.update');
  Route::get('/profileupdate/{id}', [RegisterController::class, 'profileRetrival'])->name('update.profile');
  





// View Jobs Route(needed)
Route::get('/employee/jobs', [EmployeeController::class, 'viewJobs'])->name('employee.jobs');

// Upload CV Route
Route::post('/employee/upload-cv', [EmployeeController::class, 'uploadCV'])->name('employee.upload.cv');










// Authentication routes
Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminLoginController::class, 'login']);
Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

// Test email route
Route::get('/test-email', function () {
    $cvPath = 'path/to/your/test_cv.pdf'; // Replace with a valid path
    Mail::to('recipient@example.com')->send(new CVUploaded($cvPath));
    return 'Email sent!';
});
// routes/web.php

use App\Http\Controllers\LeaveRequestController;

Route::middleware('auth')->group(function () {
    Route::get('/leave-request', [LeaveRequestController::class, 'create'])->name('leave_requests.create');
    Route::post('/leave-request', [LeaveRequestController::class, 'store'])->name('leave_requests.store');
});
