@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('login')}}" method="POST">
        @csrf
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
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="rememberMe" id="rememberMe">
            <label class="form-check-label" for="rememberMe">
              Remember me
            </label>
          </div>
        <div class="mb-3">
            <a href="{{route('password.request')}}">forgout password</a>
       </div>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
</div>
@endsection