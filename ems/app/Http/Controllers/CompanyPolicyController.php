<?php

// app/Http/Controllers/CompanyPolicyController.php
namespace App\Http\Controllers;
use App\Models\CompanyPolicy; // Import the CompanyPolicy model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CompanyPolicyController extends Controller
{
    public function createpolicy () {
        $Hr = Auth::guard('admin')->user();
        return view('upload_company_policy',compact('Hr')); }
        
        public function store(Request $request)
    {
        $request->validate([
            'policy_title' => 'required|string|max:255',
            'policy_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Store the file
        $path = $request->file('policy_file')->store('company_policies','public');

        // Save to database logic here (if needed)
        CompanyPolicy::create([
            'title' => $request->policy_title,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.company-policies.create')->with('success', 'Policy uploaded successfully!');
    }

    //added
    public function download($id)
{
    $policy = CompanyPolicy::findOrFail($id);
    $filePath = storage_path('app/public/' . $policy->file_path);

    if (!file_exists($filePath)) {
        abort(404, 'File not found.');
    }

    return response()->download($filePath, $policy->title . '.pdf');
}

//ded
public function index()
{
    $policies = CompanyPolicy::all();
    $Hr = Auth::guard('admin')->user();
    return view('list_policies', compact('policies',"Hr"));
}

public function destroy($id)
{
    $policy = CompanyPolicy::findOrFail($id);

    // Delete the file
    if (file_exists(public_path($policy->file_path))) {
        unlink(public_path($policy->file_path));
    }

    // Delete from DB
    $policy->delete();

    return redirect()->route('admin.company-policies.list')->with('success', 'Company policy deleted successfully!');
}


}
