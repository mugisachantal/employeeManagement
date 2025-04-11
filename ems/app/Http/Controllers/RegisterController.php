<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Assuming you have a register.blade.php view
    }

    public function register(Request $request)
    {
        // 1. Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'date_of_birth' => ['required', 'date'], // Allows NULL and must be a valid date format
            'sex' => ['required', 'string', 'in:M,F,O'], // Allows NULL, must be a string, and one of 'M', 'F', or 'O' (adjust as needed)
            'salary' => ['required', 'decimal:2', 'min:0', 'max:1000000000'],// Allow 2 decimal places, // Must be present, numeric, and non-negative
            'department' => ['required', 'string', 'max:255'], // Must be present, a string, max length 255
        ]);

       // If validation fails, redirect back to the form with errors
        // if ($validator->fails()) {
        //     return redirect()->route('register')
        //                      ->withErrors($validator)
        //                      ->withInput();
        // }
        $plainTextPassword = $request->input('password');

// Hashinhg the password using bcrypt (a strong hashing algorithm):
        $hashedPassword = Hash::make($plainTextPassword);

        // 2. Creating  a new employee record
        employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'sex' => $request->sex,
            'password' => $hashedPassword, 
            'salary' => $request->salary,
             'department_name'=>$request->department
        ]);
        return redirect()->route('hrdashboard')->with('success', 'Employee registered successfully in the system');
        // 3. Optionally log the user in after registration
       // auth()->login(User::where('email', $request->email)->first());

        // 4. Redirect the user to a specific page (e.g., dashboard)
        
    }

    public function showEmployeeList()
    {
        $employeesByDepartment = Employee::all()
            ->groupBy('department_name');

        return view('employeelist', compact('employeesByDepartment'));
    }
}