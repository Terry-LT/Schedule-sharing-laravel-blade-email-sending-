@extends('layouts.admin')
@section('title')
User creation
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('admin.users.create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="firstName" 
            class="form-control @error('firstName') border-danger @enderror" 
            placeholder="First Name" value="{{old('firstName')}}">
            @error('firstName')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="lastName" 
            class="form-control @error('lastName') border-danger @enderror" 
            placeholder="Last Name" value="{{old('lastName')}}">
            @error('lastName')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="email" 
            class="form-control @error('email') border-danger @enderror" 
            placeholder="Email" value="{{old('email')}}">
            @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password" 
            class="form-control @error('password') border-danger @enderror" 
            placeholder="Password" value="{{old('password')}}">
            @error('password')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="course">Choose a Course:</label>
            <select class="form-select" name="course" id="course">
                <option value="freshman">Freshman</option>
                <option value="fophomore">Sophomore</option>
                <option value="junior">Junior</option>
                <option value="senior">Senior</option>
                <option value="null">null</option>
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
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="instructor">Instructor</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
</div>
@endsection