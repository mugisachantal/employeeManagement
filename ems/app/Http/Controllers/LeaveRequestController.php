<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\HandledLeaveRequest;
use App\Models\Employee;
class LeaveRequestController extends Controller
{
    public function create()
{
    
    $employee = Auth::guard('employee')->user();
    return view('leave_requests.create',compact('employee'));
}

public function store(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string',
    ]);

    LeaveRequest::create([
        'employee_id' => auth('employee')->user()->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'reason' => $request->reason,
    ]);

    // Notify HR (optional): logic here

    return redirect()->back()->with('success', 'Leave request submitted.');
}

public function  handleLeaveRequest(LeaveRequest $leaverequest)
{
    $employee = Employee::find($leaverequest->employee_id);
    $Hr = Auth::guard('admin')->user();
    return view('leave_requests.Lrequesthandling',compact('leaverequest','employee','Hr'));
}
public function  captureFeedback(Request $request ,$id)
{
   
    $LeaveRequest = LeaveRequest::find($id);
    $LeaveRequest->status=$request->confirmation_status;
    $LeaveRequest->save();
    $LeaveRequest = LeaveRequest::find($id);
    HandledLeaveRequest::create([
        'employee_id' => $LeaveRequest->employee_id,
        'start_date' => $LeaveRequest->start_date,
        'end_date' => $LeaveRequest->end_date,
        'reason' => $LeaveRequest->reason,
        'status'=>$LeaveRequest->status

    ]);
     LeaveRequest::find($id)->delete();

$Hr=auth('admin')->user();
    return redirect()->route('hrdashboard',$Hr)->with('success', 'Feedback submitted successfully submitted.');
}
public function acknowledge(Request $request){
    $id=auth('employee')->user()->id;
   
    $HandledLeaveRequest =  HandledLeaveRequest::where('employee_id', $id)->orderBy('created_at', 'desc')->first();
  
    $HandledLeaveRequest->acknowledgement_status=$request->acknowledged;
    $HandledLeaveRequest->save();
    return redirect()->back()->with('success', 'Thanks for the acknowledgement');


}


}
