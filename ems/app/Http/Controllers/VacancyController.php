<?php
namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function create()
    {
     
        $Hr = Auth::guard('admin')->user();
        return view('post_job',compact('Hr')); // Show form to post a new job
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'experience' => 'required|string',
            'education' => 'required|string',
        ]);
    
        // Create a new vacancy record
        Vacancy::create([
            'name' => $validatedData['name'],
            'experience' => $validatedData['experience'],
            'education' => $validatedData['education'],
        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Job posted successfully!');
    }
    
    public function showJobs()
    {
        $vacancies = Vacancy::all(); // Fetch all vacancies
        //return view('vacancies.index', compact('vacancies')); // Return a view with vacancies
        return redirect('/')->with('success', 'Application submitted successfully!');

    }

    public function apiJobs()
    {
        // This method will return all vacancies in JSON format
        return response()->json(Vacancy::all());
    }
// method for deleting ade
public function destroy($id)
{
    $vacancy = Vacancy::findOrFail($id);

    // Delete associated applications and their CVs
    foreach ($vacancy->applications as $application) {
        if ($application->cv && \Storage::disk('public')->exists($application->cv)) {
            \Storage::disk('public')->delete($application->cv); // Delete the CV file
        }
        $application->delete(); // Delete the application record
    }

    $vacancy->delete(); // Delete the job advert itself

    return redirect()->route('jobs.show')->with('success', 'Job advert and related applications deleted successfully.');
}




}