<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function create()
    {
        return view('auth/teacherRegister');
    }

    // public function store(Request $request)
    // {
    //     //Validate the registration data, including teacher-specific fields
    //     $this->validate($request,[
    //         'name' => 'required|string|max:255',
    //         'middleName' => 'nullable|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         'sex' => 'required|in:male,female',
    //         'birthday' => 'required|date',
    //         'address' => 'required|string',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'contact_number' => 'required|numeric',
    //         'password' => 'required|string|min:8|confirmed',
    //         'id_number' => 'required|string|max:255',
    //         'subject' => 'required|string|max:255',
    //         'department' => 'required|string|max:255',
    //         'program' => 'required|in:kinder,elementary,high_school',
    //         'advisory_year' => 'required|integer',
    //         'advisory_section' => 'required|string|max:255',
    //     ]);

    //         // Create a new user record
    //         $user = User::create([
    //             'name' => $request->name,
    //             'middleName' => $request->middleName,
    //             'lastName' => $request->lastName,
    //             'sex' => $request->sex,
    //             'birthday' => $request->birthday,
    //             'address' => $request->address,
    //             'email' => $request->email,
    //             'contact_number' => $request->contact_number,
    //             'user_type' => 'teacher', // Set the user_type to 'teacher'
    //             'password' => Hash::make($request->password),
    //             'contactperson' => $request->name,
    //             'contactperson_number' => $request->contact_number, 
    //         ]);

    //             // Create a teacher record associated with the user
    //         $teacher = new Teacher([
    //             'user_id' => $user->id,
    //             'id_number' => $request->id_number,
    //             'subject' => $request->subject,
    //             'department' => $request->department,
    //             'program' => $request->program,
    //             'advisory_year' => $request->advisory_year,
    //             'advisory_section' => $request->advisory_section,
    //         ]);

    //         $user->teacher()->save($teacher);
    public function store(Request $request)
    {
        // Validate the registration data, including teacher-specific fields
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
            'id_number' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'program' => 'required|in:kinder,elementary,high_school',
            'advisory_year' => 'required|integer',
            'advisory_section' => 'required|string|max:255',
            'subject' => 'required', // Ensure it's an array with a maximum of 5 element // Validation for each subject in the array
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
            'user_type' => 'teacher',
            'password' => Hash::make($request->password),
            'contactperson' => $request->name,
            'contactperson_number' => $request->contact_number,
        ]);

        // Create a teacher record associated with the user
        $teacher = new Teacher([
            'user_id' => $user->id,
            'id_number' => $request->id_number,
            'department' => $request->department,
            'subject' => json_encode($request->input('subject')),
            'program' => $request->program,
            'advisory_year' => $request->advisory_year,
            'advisory_section' => $request->advisory_section,
        ]);

        $user->teacher()->save($teacher);

        // Attach subjects to the teacher
        // $teacher->subjects()->attach($request->input('subjects'));

            // Redirect to a success page or do any additional tasks
        return view('auth/teacherLogin')->with('success', 'Teacher registration successful!');
    }


    //LOGIN
    public function showLoginForm()
    {
        return view('auth/teacherLogin');
    }

    public function login(Request $request)
    {
        // Validate the login data
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the teacher
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the teacher's dashboard or another page
            return redirect()->route('teacher.dashboard')->with('success', 'Login successful!');
        }

        // Authentication failed, redirect back with errors
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

}
