<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Announcement; 
use App\Models\CompanyPolicy; 

class EmployeeController extends Controller
{
    // Display employee dashboard
    public function employeedashboard()
    {
        return view('employeedashboard'); // Return the employee dashboard view
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