<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    // Display form to upload job PDF
    public function showForm()
    {
        return view('postjob');
    }

    // Handle file upload
    public function upload(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'job_pdf' => 'required|mimes:pdf|max:5120',
    ]);

    // ✅ Debug: Is the file present and valid?
    if (!$request->hasFile('job_pdf')) {
        return back()->withErrors(['job_pdf' => 'No file uploaded.']);
    }

    if (!$request->file('job_pdf')->isValid()) {
        return back()->withErrors(['job_pdf' => 'Uploaded file is not valid.']);
    }

    // ✅ Store the file
    $path = $request->file('job_pdf')->store('jobs', 'public');

    // ✅ Debug: Did we get a path?
    if (!$path) {
        return back()->withErrors(['job_pdf' => 'Failed to store file.']);
    }

    // ✅ Save to database
    Job::create([
        'title' => $request->title,
        'pdf_path' => $path,
    ]);

    return back()->with('success', 'Job posted successfully!');
}
}