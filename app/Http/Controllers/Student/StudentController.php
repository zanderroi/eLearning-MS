<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function create()
    {
        return view('auth.learnersRegistration');
    }

    public function store(Request $request)
    {
        // Validate the registration data, including student-specific fields
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'sex' => 'required|in:male,female',
            'birthday' => 'required|date',
            'address' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
            'contactperson' => 'required|string|max:255',
            'contactperson_number' => 'required|numeric',
            'grade' => 'required|string|max:255', // Add validation for grade
            'section' => 'required|string|max:255', // Add validation for section
            'lrn' => 'required|string|max:255', // Add validation for LRN
        ]);


         // Create a new user record
         $user = User::create([
            'name' => $request->name,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'user_type' => 'student', // Set the user_type to 'student'
            'password' => Hash::make($request->password),
            'contactperson' => $request->contactperson,
            'contactperson_number' => $request->contactperson_number,
        ]);

        // Create a student record associated with the user
        $student = new Student([
            'user_id' => $user->id,
            'grade' => $request->grade,
            'section' => $request->section,
            'lrn' => $request->lrn,
        ]);

        $user->student()->save($student);

        // Redirect to a success page or do any additional tasks
        return view('auth/studentLogin')->with('success', 'Student registration successful!');
    }


    //STUDENT LOGIN

    public function showLoginForm()
    {
        return view('auth/studentLogin');
    }

    public function login(Request $request)
    {
        // Validate the login data
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the student
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the student's dashboard or another page
            return view('student.studentDashboard')->with('success', 'Login successful!');
        }

        // Authentication failed, redirect back with errors
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function dashboard(){
        return view('student/studentDashboard');
    }


}