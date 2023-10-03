@extends('layouts.app')

@section('title', 'Student')
@section('content')

    <x-brightsparks_header />
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <x-student_sidebar />

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <h1> Welcome, {{$user->name}}</h1>

        </div>

    </div>






@endsection
