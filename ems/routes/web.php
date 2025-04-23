
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\EmployeeController; 
use App\Http\Controllers\CompanyPolicyController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LeaveRequestController;
use App\Mail\CVUploaded; 
use Illuminate\Support\Facades\Mail; 
Route::get('/', [SalaryController::class, 'Paymentcheck'])->name('index');


// Admin protected routes
Route::middleware(['auth:admin'])->group(function () {
  // employee profile  management routes
  Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register') ;
  Route::post('/register', [RegisterController::class, 'register'])->middleware('auth:admin');
  Route::get('/hrdashboard/{Hr}', [RegisterController::class, 'test'])->name('hrdashboard');
  Route::get('/employeelist/{T}', [RegisterController::class, 'showEmployeeList'])->name('employeelist');
  Route::get('/delete/{id}', [RegisterController::class, 'delete'])->name('delete');
  Route::post('/adminprofileupdate', [RegisterController::class, 'adminUpdate'])->name('Admin.profile.update');
  Route::get('/profileupdate/{id}', [RegisterController::class, 'profileRetrival'])->name('update.profile');

  //policy routes
  Route::get('/admin/company-policies/create', [CompanyPolicyController::class, 'createpolicy'])->name('admin.company-policies.create');
  Route::post('/admin/company-policies/store', [CompanyPolicyController::class, 'store'])->name('admin.company-policies.store');
  Route::get('/admin/company-policies', [CompanyPolicyController::class, 'index'])->name('admin.company-policies.list');
  Route::delete('/admin/company-policies/delete/{id}', [CompanyPolicyController::class, 'destroy'])->name('admin.company-policies.delete');

  //anoucement routes
  Route::get('/admin/announcements/create', [AnnouncementController::class, 'create'])->name('admin.announcements.create');
 Route::post('/admin/announcements/store', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
Route::get('/admin/announcements', [AnnouncementController::class, 'index'])->name('admin.announcements.list');
Route::delete('/admin/announcements/delete/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.delete');

//leave requests
Route::get('/leave-request/handling/{leaverequest}', [LeaveRequestController::class, 'handleLeaveRequest'])->name('leave.request.handling');
Route::post('/leave-request/handling/{id}', [LeaveRequestController::class, 'captureFeedback']);

});


// Employee protected routes
Route::middleware(['auth:employee'])->group(function () {
    // Employee Dashboard Route
Route::get('/edashboard/{employee}', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

//announcement management routes
Route::get('/employee/announcements', [EmployeeController::class, 'viewAnnouncements'])->name('employee.announcements');
Route::get('/announcements/download/{id}', [AnnouncementController::class, 'download'])->name('announcements.download');

//company policy routes
Route::get('/employee/company-policies', [EmployeeController::class, 'viewCompanyPolicies'])->name('employee.company-policies');
Route::get('/company-policies/download/{id}', [CompanyPolicyController::class, 'download'])->name('company-policies.download');

// leave request routes
Route::get('/leave-request', [LeaveRequestController::class, 'create'])->name('leave_requests.create');
Route::post('/leave-request', [LeaveRequestController::class, 'store'])->name('leave_requests.store');
Route::post('/acknowledgement', [LeaveRequestController::class, 'acknowledge'])->name('acknowledge');
  
 
});


// Route to view announcements


// Route to view company policies



//salary  tracking and management route 
  Route::post('/paymentconfirmation/{email}', [SalaryController::class, 'paymentConfirmation'])->name('payment.confirmation')->middleware('auth:admin');
  Route::post('/paymentconfirmed/{id}', [SalaryController::class, 'paymentConfirmed'])->name('payment.confirmed')->middleware('auth:employee');
  // Job posting routes
 
  

  Route::get('/employee/{id}', [RegisterController::class, 'edit'])->name('editing');
  Route::post('/employee/{id}/{flag}', [RegisterController::class, 'update'])->name('update');

 
  





// View Jobs Route(needed)
Route::get('/employee/jobs', [EmployeeController::class, 'viewJobs'])->name('employee.jobs');


// Authentication routes

Route::post('login', [AdminLoginController::class, 'login'])->name('login');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');



//Route for uploading of company policies

//Route for uploading of announcements



// for storing company policies into db




// Announcement download route

// Company policy download route


// List views


// Delete routes



//jobs 
// Show form to post a job
Route::get('/post-job', [VacancyController::class, 'create'])->name('job.form'); 

// Store job
Route::post('/post-job', [VacancyController::class, 'store'])->name('job.store');

 // View all jobs
Route::get('/view-jobs', [VacancyController::class, 'showJobs'])->name('jobs.show'); 

// Apply for a job
Route::get('/apply/{vacancy}', [ApplicationController::class, 'create'])->name('apply.form'); 
//Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.submit'); // Submit the application

 // View applicants
Route::get('/admin/applicants', [ApplicationController::class, 'index'])->name('admin.applicants'); // View applicants

// Download CV
Route::get('/download-cv/{file}', [ApplicationController::class, 'download'])->name('cv.download'); 

//sumit application
Route::post('/apply/{vacancy}', [ApplicationController::class, 'store'])->name('apply.submit');

//store applications
Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.store');

// Route in api for fetching vacancies to landing page
Route::get('/api/jobs', [VacancyController::class, 'apiJobs'])->name('jobs.api');

//
//Route::get('/admin/applications', [ApplicationController::class, 'viewApplications'])->name('applications.view');
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

//deleting of the Cv
Route::delete('/jobs/{id}', [VacancyController::class, 'destroy'])->name('job.delete');
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('application.delete');

//
Route::get('/admin/dashboard', [ApplicationController::class, 'index'])->name('admin.dashboard');




// Route::middleware('auth')->group(function () {
    
// });



