<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use App\Mail\CVUploaded;

class EmployeeController extends Controller
{
    // Display employee dashboard
    public function dashboard()
    {
        return view('employeedashboard'); // Return the employee dashboard view
    }

    // View available jobs
    public function viewJobs()
    {
        $jobs = Job::all(); // Fetch all jobs from the database
        return view('employeejobs', compact('jobs')); // Return the jobs view with jobs data
    }

    // Handle CV upload
    public function uploadCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:5120', // Validate the CV file
        ]);

        // Store the CV
        $path = $request->file('cv')->store('cvs', 'public');

        // Send CV to admin via email
        Mail::to('omallaroy02@gmail.com')->send(new CVUploaded($path));

        return back()->with('success', 'CV uploaded successfully!'); // Redirect back with success message
    }
}