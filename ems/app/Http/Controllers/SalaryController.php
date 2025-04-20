<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\SMonthStatus;
use App\Models\paid_employee;
use App\Models\confirmation_lists;
use App\Models\UnpaidEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SalaryController extends Controller
{

    public function Paymentcheck()
    {  
       
        $SMonthStatus= SMonthStatus::findOrFail(Carbon::now()->month);
        $status=$SMonthStatus->status;
        if($status==0)
        {
                  if(Carbon::now()->day ===20 )
                    {


                        $employees = Employee::all();

                       foreach ($employees as $employee)
                       {
                                 UnpaidEmployee::create
                                                        (
                                                [
                                                                'name' => $employee->name,
                                                                'email' => $employee->email,
                                                                'salary' => $employee->salary,
                                                            ]
                                                        );
                        }

                                    $SMonthStatus->status=1;
                                    $SMonthStatus->save();
                    }
        }
    return view('index');
    }
    public function paymentConfirmation(Request $request, $employeeId)
{
    if( $request instanceof Request){
        $employee = Employee::findOrFail($employeeId); // Find the employee by ID
        UnpaidEmployee::where('email', $employee->email)->delete();
        confirmation_lists::create([
            'name' => $employee->name,
            'email' => $employee->email,
            'salary' => $employee->salary,
        ]);

    }
}    public function paymentConfirmed(Request $request, $id)
    { 
         $employee=Employee::findOrFail($id);
        if( $request instanceof Request){
           
           confirmation_lists::where('email', $employee->email)->delete();
            if ($request->confirmation_status=='true') {
            UnpaidEmployee::where('email', $employee->email)->delete();
             paid_employee::create
             (
     [
                     'name' => $employee->name,
                     'email' => $employee->email,
                     'salary' => $employee->salary,
                 ]
             );
            
             } else {
              
                UnpaidEmployee::create
                (
        [
                        'name' => $employee->name."  rejected payment claim",
                        'email' => $employee->email,
                        'salary' => $employee->salary,
                    ]
                );
                
             }
             
        }
        return redirect()->route('employee.dashboard',['employee'=> $employee ]);
     
       
    }
}
