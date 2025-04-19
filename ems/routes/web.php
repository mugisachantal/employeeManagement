
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLoginController;

use App\Http\Controllers\EmployeeController; 
use App\Http\Controllers\CompanyPolicyController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;


use App\Mail\CVUploaded; 
use Illuminate\Support\Facades\Mail; 


// Admin protected routes
Route::middleware(['auth:admin'])->group(function () {
 
});


// Employee protected routes
Route::middleware(['auth:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'employeedashboard'])->name('employeedashboard');
    // ... other employee protected routes
});


Route::get('/', function () {
    return view('index');
})->name('index');

  
  
  // employee profile  management routes
  Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register') ->middleware('auth:admin');;
  Route::post('/register', [RegisterController::class, 'register']);
  Route::get('/hrdashboard{Hr}', [RegisterController::class, 'test'])->name('hrdashboard');
  Route::get('/employeelist/{T}', [RegisterController::class, 'showEmployeeList'])->name('employeelist');
  Route::get('/employee/{id}/{flag}', [RegisterController::class, 'edit'])->name('editing');
  //Route::get('/employee/{id}', [RegisterController::class, 'edit'])->name('editing');//
  Route::post('/employee/{id}', [RegisterController::class, 'update']);
  Route::get('/delete/{id}', [RegisterController::class, 'delete'])->name('delete');
  Route::get('/adminprofileupdate/{id}', [RegisterController::class, 'update'])->name('adminprofileupdate');



// Employee Dashboard Route
//Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

// View Jobs Route(needed)
Route::get('/employee/jobs', [EmployeeController::class, 'viewJobs'])->name('employee.jobs');

// Upload CV Route
Route::post('/employee/upload-cv', [EmployeeController::class, 'uploadCV'])->name('employee.upload.cv');




// Authentication routes
Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminLoginController::class, 'login']);
Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');


//
Route::get('/admin/company-policies/create', function () {
    return view('upload_company_policy');
})->name('admin.company-policies.create');

Route::post('/admin/company-policies/store', [CompanyPolicyController::class, 'store'])->name('admin.company-policies.store');
//
Route::get('/admin/announcements/create', function () {
    return view('upload_announcement');
})->name('admin.announcements.create');

Route::post('/admin/announcements/store', [AnnouncementController::class, 'store'])->name('admin.announcements.store');


// Route to view announcements
Route::get('/employee/announcements', [EmployeeController::class, 'viewAnnouncements'])->name('employee.announcements');

// Route to view company policies
Route::get('/employee/company-policies', [EmployeeController::class, 'viewCompanyPolicies'])->name('employee.company-policies');

//added
// Announcement download route
Route::get('/announcements/download/{id}', [AnnouncementController::class, 'download'])->name('announcements.download');

// Company policy download route
Route::get('/company-policies/download/{id}', [CompanyPolicyController::class, 'download'])->name('company-policies.download');

//ded
// List views
Route::get('/admin/announcements', [AnnouncementController::class, 'index'])->name('admin.announcements.list');
Route::get('/admin/company-policies', [CompanyPolicyController::class, 'index'])->name('admin.company-policies.list');

// Delete routes
Route::delete('/admin/announcements/delete/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.delete');
Route::delete('/admin/company-policies/delete/{id}', [CompanyPolicyController::class, 'destroy'])->name('admin.company-policies.delete');

//jobs 
Route::get('/post-job', [VacancyController::class, 'create'])->name('job.form'); // Show form to post a job
Route::post('/post-job', [VacancyController::class, 'store'])->name('job.store'); // Store job

Route::get('/view-jobs', [VacancyController::class, 'showJobs'])->name('jobs.show'); // View all jobs

Route::get('/apply/{vacancy}', [ApplicationController::class, 'create'])->name('apply.form'); // Apply for a job
//Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.submit'); // Submit the application

Route::get('/admin/applicants', [ApplicationController::class, 'index'])->name('admin.applicants'); // View applicants
Route::get('/download-cv/{file}', [ApplicationController::class, 'download'])->name('cv.download'); // Download CV
//
Route::post('/apply/{vacancy}', [ApplicationController::class, 'store'])->name('apply.submit');
//
Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.store');
// api
Route::get('/api/jobs', [VacancyController::class, 'apiJobs'])->name('jobs.api');

//neww view
Route::get('/admin/applications', [ApplicationController::class, 'viewApplications'])->name('applications.view');
//
Route::get('/apply', [ApplicationController::class, 'showApplicationForm'])->name('apply.form');
//
// Route to view applications
Route::get('/admin/applications', [ApplicationController::class, 'viewApplications'])->name('admin.applications');
//
Route::get('/apply/{vacancy}', [ApplicationController::class, 'showApplicationForm'])->name('apply.form');
//
Route::get('/view-jobs', [VacancyController::class, 'showJobs'])->name('jobs.show');
//
// route for downloading Cv
Route::get('/download-cv/{file}', [ApplicationController::class, 'download'])->name('cv.download');
//delete
Route::delete('/jobs/{id}', [VacancyController::class, 'destroy'])->name('job.delete');
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('application.delete');

//
Route::get('/admin/dashboard', [ApplicationController::class, 'index'])->name('admin.dashboard');

