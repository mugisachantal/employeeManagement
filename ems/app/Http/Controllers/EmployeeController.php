<?php
namespace App\Http\Controllers;

use App\Models\confirmation_lists;
use App\Models\Announcement;
use App\Models\CompanyPolicy;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use App\Mail\CVUploaded;

class EmployeeController extends Controller
{
    // Display employee dashboard
    public function dashboard(Employee $employee)
    {
        $exists = confirmation_lists::where('email', $employee->email)->exists();
     
        
      
        if ($exists) {
            $confirm=1;
         
         } else {
             // No employee found with the email in $email
             $confirm=0;
         }
        return view('employeedashboard',compact('employee','confirm')); // Return the employee dashboard view
    }

    public function viewAnnouncements()
    {
        // Fetch all announcements from the database
        $announcements = Announcement::all();
        return view('announcements', compact('announcements'));
    }

    public function viewCompanyPolicies()
    {
        // Fetch all company policies from the database
        $policies = CompanyPolicy::all();
        return view('company_policies', compact('policies'));
    }
}