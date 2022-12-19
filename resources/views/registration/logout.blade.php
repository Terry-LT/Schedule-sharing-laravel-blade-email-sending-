@extends('layouts.app')
@section('title')
Logout
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <div>
            <button type="submit" class="btn btn-primary">Logout</button>
        </div>
    </form>
</div>
</div>
@endsection