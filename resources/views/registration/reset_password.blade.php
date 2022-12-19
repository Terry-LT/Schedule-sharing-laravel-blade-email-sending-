@extends('layouts.app')
@section('title')
Password Reset Form
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('password.reset',$token)}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
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
        <div>
            <button type="submit" class="btn btn-primary">Reset</button>
        </div>
    </form>
</div>
</div>
@endsection