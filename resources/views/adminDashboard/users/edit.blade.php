@extends('layouts.admin')
@section('title')
User Update
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('admin.users.edit',$user)}}" method="POST">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <input type="text" name="firstName" 
            class="form-control @error('firstName') border-danger @enderror" 
            placeholder="First Name" value="{{$user->firstName}}">
            @error('firstName')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="lastName" 
            class="form-control @error('lastName') border-danger @enderror" 
            placeholder="Last Name" value="{{$user->lastName}}">
            @error('lastName')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="email" 
            class="form-control @error('email') border-danger @enderror" 
            placeholder="Email" value="{{$user->email}}">
            @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="course">Choose a Course:</label>
            <select class="form-select" name="course" id="course">
                <option @if ($user->course == 'freshman') selected @endif value="freshman">Freshman</option>
                <option @if ($user->course == 'sophomore') selected @endif value="sophomore">Sophomore</option>
                <option @if ($user->course == 'junior') selected @endif value="junior">Junior</option>
                <option @if ($user->course == 'senior') selected @endif value="senior">Senior</option>
                <option @if ($user->course == 'null') selected @endif value="null">null</option>
            </select>
            @error('course')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role">Choose a Role:</label>
            <select class="form-select" name="role" id="role">
                <option @if ($user->hasRole('admin')) selected @endif value="admin">Admin</option>
                <option @if ($user->hasRole('student')) selected @endif  value="student">Student</option>
                <option @if ($user->hasRole('instructor')) selected @endif  value="instructor">Instructor</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
</div>
@endsection