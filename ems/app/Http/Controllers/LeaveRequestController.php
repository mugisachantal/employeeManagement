<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function create()
{
    return view('leave_requests.create');
}

public function store(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string',
    ]);

    LeaveRequest::create([
        'employee_id' => auth()->id(),
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'reason' => $request->reason,
    ]);

    // Notify HR (optional): logic here

    return redirect()->back()->with('success', 'Leave request submitted.');
}

}
