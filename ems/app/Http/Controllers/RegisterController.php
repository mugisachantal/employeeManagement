<?php

namespace App\Http\Controllers;
use App\Models\Administrator;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Route;

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

    public function showEmployeeList($T)
    {
        $employeesByDepartment = Employee::all()
            ->groupBy('department_name');
           

        return view('employeelist', compact('employeesByDepartment',"T"));
    }

    public function test(Administrator $Hr)
    {

            $employees = Employee::all();

        return view('hrdashboard', compact('employees','Hr'));
    }

    public function edit($id)
    {  $flag= 0;
        $employee = Employee::findOrFail($id,);
        return view('employee', compact('employee','flag')); 
    }


    public function profileRetrival($id)
    {   $flag= 1;
        $employee = Employee::findOrFail($id,);
        return view('employee', compact('employee','flag')); 
    }

    public function update(Request $request, $id,$flag)
    {    if($flag==1|| $flag==0){
        $employee = Auth::guard('employee')->user();
        $employee = Employee::findOrFail($id);
    }else{
        return redirect()->route('login')->with('errors','you not logged in ,please login to continue ');
    }
        

        $rules = [
                    'name' => 'nullable|string|max:255',
                    'email' => 'nullable|string|email|max:255|unique:employees,email,' . $id,
                    'date_of_birth' => 'nullable|date',
                    'sex' => 'nullable|string|in:m,M,f,F,o,O',
                    'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                     'password' => 'nullable|string|min:8|confirmed', // 'confirmed' requires a 'password_confirmation' field
                    'salary' => 'nullable|numeric|min:0',
                    'department_name' => 'nullable|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update the employee attributes if the corresponding key is present in the request
        if ($request->filled('name')) {
            $employee->name = $request->input('name');
        }

        if ($request->filled('email')) {
            $employee->email = $request->input('email');
        }

        if ($request->filled('date_of_birth')) {
            $employee->date_of_birth = $request->input('date_of_birth');
        }

        if ($request->filled('sex')) {
            $employee->sex = $request->input('sex');
        }

        if ($request->filled('profile_picture')) {
          
            $image = $request->file('profile_picture');
            $filename = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('profile_pictures', $filename, 'public'); // Store in storage/app/public/profile_pictures
           // Delete the old profile picture if it exists
            if ($employee->profile_picture && Storage::disk('public')->exists($employee->profile_picture)) {
                Storage::disk('public')->delete($employee->profile_picture_path);
            }
            $employee->profile_picture = $path;
        }

        if ($request->filled('password')) {
            $employee->password = Hash::make($request->input('password'));
        }

        if ($request->filled('salary')) {
            $employee->salary = $request->input('salary');
        }

        if ($request->filled('department_name')) {
            $employee->department_name = $request->input('department_name');
        }

        $employee->save();
        if($flag==0){
        $Hr = Auth::guard('admin')->user();
        
        return redirect()->route('hrdashboard',['Hr' => $Hr])->with('success',$employee->name.' record updtaed successfully');
        }else{
            return redirect()->route('employeedashboard');
        }
        //return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee], 200);
    }
    public function delete($id){
        $employee =employee::findOrFail($id);
        $Hr = Auth::guard('admin')->user();
        if($employee){
            $employee->delete();
            return redirect()->route('hrdashboard',['Hr' => $Hr])->with('success',$employee->name.'\'s record deleted successfully');
        }
         return redirect()->route('hrdashboard',['Hr' => $Hr])->with('success',$employee->name.'\'s  record were already not there in our record ');
    }
}