@extends('layouts.app')
@section('title')
Request Password
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('password.request')}}" method="POST">
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
        <div>
            <button type="submit" class="btn btn-primary">Send Request</button>
        </div>
    </form>
</div>
</div>
@endsection