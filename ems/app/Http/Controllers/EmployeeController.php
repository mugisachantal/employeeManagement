<?php
namespace App\Http\Controllers;

use App\Models\confirmation_lists;
use App\Models\Announcement;
use App\Models\CompanyPolicy;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\HandledLeaveRequest;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\CVUploaded;


class EmployeeController extends Controller
{
    // Display employee dashboard
    public function dashboard(Employee $employee)
    {
        $exists_in_confirmation_list = confirmation_lists::where('email', $employee->email)->exists();
        $exists_in_leave_request = LeaveRequest::where('employee_id', $employee->id)->exists();
        $exists_in_handled_leave_request = HandledLeaveRequest::where('employee_id', $employee->id)->exists();
        $request_status=null;
        if ($exists_in_confirmation_list) {
            $confirm=1;
         
         } else {
             // No employee found with the email in $email
             $confirm=0;
         }

         $AKrequired=0;
         if ($exists_in_leave_request||$exists_in_handled_leave_request) {
            $request_available=1;
            

            if($exists_in_leave_request){
            $request_status=LeaveRequest::where('employee_id', $employee->id)->first()->status;
            }else{
                $request_status=HandledLeaveRequest::where('employee_id', $employee->id)->orderBy('created_at', 'desc')->first()->status;
                $AKrequired=1;
                $acknowledgement_status=HandledLeaveRequest::where('employee_id', $employee->id)->orderBy('created_at', 'desc')->first()->acknowledgement_status;
                if($acknowledgement_status=='yes'){
                    $request_available=0;  
                }
            }
         } else {
             // No employee found with the email in $email
             $request_available=0;
         }
        return view('employeedashboard',compact('employee','confirm','request_available','request_status','AKrequired')); // Return the employee dashboard view
    }

    public function viewAnnouncements()
    {
        // Fetch all announcements from the database
        $employee = Auth::guard('employee')->user();
       
        $announcements = Announcement::all();
        return view('announcements', compact('announcements','employee'));
    }

    public function viewCompanyPolicies()
    {
        // Fetch all company policies from the database
        $policies = CompanyPolicy::all();
        $employee = Auth::guard('employee')->user();
        return view('company_policies', compact('policies','employee'));
    }
}