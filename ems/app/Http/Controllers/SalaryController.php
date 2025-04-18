<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\UnpaidEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SalaryController extends Controller
{
    public function Paymentcheck()
    {
        if(Carbon::now()->day === Carbon::now()->day )
        {
            $employees = Employee::all(['name', 'salary']);

            foreach ($employees as $employee)
            {
                UnpaidEmployee::create
                    (
            [
                            'name' => $employee->name,
                            'salary' => $employee->salary,
                        ]
                    );
            }
          return view('index'); // Assuming you have a register.blade.php view
       }
    }
}
