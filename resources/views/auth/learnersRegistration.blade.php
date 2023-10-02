@extends('layouts.app')

@section('title', 'Student Registration')
@section('content')
<x-navbar />
<div class="min-h-screen min-w-full flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">{{ __('Student Registration') }}</h2>

        <form method="POST" action="/student/registered" class="space-y-4">
            @csrf
            <h2 class="font-bold text-blue-700 text-xl"> PERSONAL DETAILS </h2>
            <hr>
            <div class="flex flex-row space-x-4">
                 <!-- Name -->
            <div>
                <label for="name" class="block text-gray-500">Name</label>
                <input id="name" type="text" class="bg-gray-200 p-2 rounded-md" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Middle Name -->
            <div>
                <label for="middleName" class="block text-gray-500">Middle Name</label>
                <input id="middleName" type="text" class="bg-gray-200 p-2 rounded-md" name="middleName"
                    value="{{ old('middleName') }}" autocomplete="middleName">
            </div>

            <!-- Last Name -->
            <div>
                <label for="lastName" class="block text-gray-500">Last Name</label>
                <input id="lastName" type="text" class="bg-gray-200 p-2 rounded-md" name="lastName"
                    value="{{ old('lastName') }}" required autocomplete="lastName">
                @error('lastName')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            </div>

            <div class="flex flex-row space-x-4">
                 <!-- Sex -->
            <div>
                <label for="sex" class="block text-gray-500">Sex</label>
                <select id="sex" class="bg-gray-200 p-2 rounded-md" style="width: 12.5rem;" name="sex" required>
                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Birthday -->
            <div>
                <label for="birthday" class="block text-gray-500">Birthday</label>
                <input id="birthday" type="date" class="bg-gray-200 p-2 rounded-md" style="width: 12rem;" name="birthday"
                    value="{{ old('birthday') }}" required>
            </div>

              <!-- Contact Number -->
              <div>
                <label for="contact_number" class="block text-gray-500">Contact Number</label>
                <input id="contact_number" type="text" class="bg-gray-200 p-2 rounded-md" name="contact_number"
                    value="{{ old('contact_number') }}" required>
                @error('contact_number')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>




            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-gray-500">Address</label>
                <input id="address" type="text" class="bg-gray-200 p-2 rounded-md w-full" name="address"
                    value="{{ old('address') }}" required>
            </div>

            <div class="flex flex-row space-x-4 w-full">

                 <!-- Contact Person -->
            <div class="w-1/2">
                <label for="contactperson" class="block text-gray-500">Contact Person</label>
                <input id="contactperson" type="text" class="bg-gray-200 p-2 rounded-md w-full" name="contactperson"
                    value="{{ old('contactperson') }}" required>
            </div>

            <!-- Contact Person Number -->
            <div class="w-1/2">
                <label for="contactperson_number" class="block text-gray-500">Contact Person Number</label>
                <input id="contactperson_number" type="text" class="bg-gray-200 p-2 rounded-md w-full" name="contactperson_number"
                    value="{{ old('contactperson_number') }}" required>
            </div>


                
            </div>

            <h2 class="font-bold text-blue-700 text-xl"> STUDENT INFORMATION </h2>
            <hr>

            <div class="flex flex-row space-x-4 w-full">

                
            </div>


            <!-- Email -->
            <div>
                <label for="email" class="block">Email</label>
                <input id="email" type="email" class="form-input" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

          

            <!-- Password -->
            <div>
                <label for="password" class="block">Password</label>
                <input id="password" type="password" class="form-input" name="password" required autocomplete="new-password">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password-confirm" class="block">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required
                    autocomplete="new-password">
            </div>

           
            <!-- Grade -->
            <div>
                <label for="grade" class="block">Grade</label>
                <input id="grade" type="text" class="form-input" name="grade"
                    value="{{ old('grade') }}" required>
            </div>

            <!-- Section -->
            <div>
                <label for="section" class="block">Section</label>
                <input id="section" type="text" class="form-input" name="section"
                    value="{{ old('section') }}" required>
            </div>

            <!-- LRN -->
            <div>
                <label for="lrn" class="block">LRN (Learner's Reference Number)</label>
                <input id="lrn" type="text" class="form-input" name="lrn"
                    value="{{ old('lrn') }}" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
