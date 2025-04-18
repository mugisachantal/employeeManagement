<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\paid_employee;
use App\Models\confirmation_lists;
use App\Models\UnpaidEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SalaryController extends Controller
{
    public function Paymentcheck()
    {
        if(Carbon::now()->day === Carbon::now()->day )
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
          return view('index'); // Assuming you have a register.blade.php view
       }
    }
    public function paymentConfirmation(Request $request, $email)
    {      if( $request instanceof Request){
        $employee = Employee::where('email', $email)->first();
        confirmation_lists::create
        (
[
                'name' => $employee->name,
                'email' => $employee->email,
                'salary' => $employee->salary,
            ]
        );
    
    }

       
    }
    public function paymentConfirmed(Request $request, $id)
    {  
            
        $employee=Employee::findOrFail($id);
        $deletedRows = UnpaidEmployee::where('email', $employee->email)->delete();
        if ($deletedRows > 0) {
           $confirm=1;
           return view('$confirm');
        } else {
            // No employee found with the email in $email
            return null;
        }
    }
}
