<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Vacancy; 
use Symfony\Component\HttpFoundation\StreamedResponse;
class ApplicationController extends Controller
{
    public function store(Request $request, $vacancyId)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string',
            'cv' => 'required|file|mimes:pdf|max:10240', // Limit to 10MB for example
        ]);
    
        // Handle file upload
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs','public'); // Store the CV in the storage/app/public/cvs directory
            \Log::info('CV uploaded to: ' . $cvPath); // Log the path for debugging
        } else {
            return redirect()->back()->withErrors(['cv' => 'CV file is required.']);
        }
    
        // Store the application data and associate it with the vacancy
        Application::create([
            'vacancy_id' => $vacancyId, // Store the vacancy ID
            'name' => $validated['name'],
            'email' => $validated['email'],
            'contact' => $validated['contact'],
            'cv' => $cvPath, // Store the CV file path
        ]);
    
        // Redirect with a success message
        return redirect()->route('jobs.show')->with('success', 'Application submitted successfully.');
    }
    
    public function viewApplications()
{
    $applications = Application::with('vacancy')->latest()->get(); // eager load vacancy details if needed
    return view('view_applications', compact('applications'));
}

//
public function showApplicationForm($vacancyId)
{
    return view('apply_form', compact('vacancyId')); // Passes the vacancy ID to the view
}
// method for downloading CV by admin
public function download($file)
{
    $filePath = 'cvs/' . $file;

    if (Storage::disk('public')->exists($filePath)) {
        return Storage::disk('public')->download($filePath);
    }

    abort(404, 'File not found.');
}

//Deelet method ade


public function destroy($id)
{
    $application = Application::findOrFail($id);

    // Delete the associated CV file from storage
    if ($application->cv && \Storage::disk('public')->exists($application->cv)) {
        \Storage::disk('public')->delete($application->cv); // Delete the CV file
    }

    $application->delete(); // Delete the application record

    return redirect()->route('admin.applications')->with('success', 'Application and CV deleted successfully.');
}
//
public function index()
{
    // Get total number of applications
    $totalApplications = Application::count();

    return view('admin.dashboard', compact('totalApplications'));  // Assuming 'admin.dashboard' is your admin dashboard view
}


}
