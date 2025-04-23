<?php

// app/Http/Controllers/AnnouncementController.php
namespace App\Http\Controllers;
use App\Models\Announcement; // Import the Announcement model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'announcement_title' => 'required|string|max:255',
            'announcement_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Store the file
        $path = $request->file('announcement_file')->store('announcements','public');

        // Save to database logic here (if needed)
        Announcement::create([
            'title' => $request->announcement_title,
            'file_path' => $path,// Store the path in the database
        ]);

        return redirect()->route('admin.announcements.create')->with('success', 'Announcement uploaded successfully!');
    }

    public function create() {
        $Hr = Auth::guard('admin')->user();
        return view('upload_announcement',compact('Hr'));
    }
 // added route('admin.announcements.create')
 //added
 public function download($id)
 {
     $announcement = Announcement::findOrFail($id);
     $filePath = storage_path('app/public/' . $announcement->file_path);
 
     if (!file_exists($filePath)) {
         abort(404, 'File not found.');
     }
 
     return response()->download($filePath, $announcement->title . '.pdf');
 }
//ded
public function index()
{
    $announcements = Announcement::all();
    $Hr = Auth::guard('admin')->user();
    return view('list_announcements', compact('announcements',"Hr"));
}

public function destroy($id)
{
    $announcement = Announcement::findOrFail($id);

    // Delete the file
    if (file_exists(public_path($announcement->file_path))) {
        unlink(public_path($announcement->file_path));
    }

    // Delete from DB
    $announcement->delete();

    return redirect()->route('admin.announcements.list')->with('success', 'Announcement deleted successfully!');
}

}
