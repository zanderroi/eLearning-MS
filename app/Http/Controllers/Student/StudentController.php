<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function create()
    {
        return view('auth.students.register');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'year_level' => 'required|string',
            'course' => 'required|string',
            'section' => 'required|string',
            'student_status' => 'required|string',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'user_type' => 'student',
        ]);

        // Create a student record associated with the user
        $student = new Student([
            'year_level' => $validatedData['year_level'],
            'course' => $validatedData['course'],
            'section' => $validatedData['section'],
            'student_status' => $validatedData['student_status'],
        ]);

        $user->student()->save($student);

        // Redirect to a success page or do any additional tasks
        return redirect()->route('students.register')->with('success', 'Student registration successful!');
    }
}