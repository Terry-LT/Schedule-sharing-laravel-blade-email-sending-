@extends('layouts.admin')
@section('title')
All Users
@endsection
@section('content')

<div class="container">
<a href="{{route('admin.users.create')}}">Create User</a>
<div>
    @if ($users->isEmpty())
        <div class="text-center">
            There is no users
        </div>        
    @else

    <ul class="list-group mt-5">
        @foreach ($users as $user)
        <li class="list-group-item">
            {{$user->name}}
            @if ($user->hasRole('admin'))
            <span class="badge bg-primary rounded-pill">admin</span>
            @endif
            @if ($user->hasRole('student'))
            <span class="badge bg-primary rounded-pill">student</span>
            @endif
            @if ($user->hasRole('instructor'))
            <span class="badge bg-primary rounded-pill">instructor</span>
            @endif
            <form action="{{route('admin.users.delete',$user)}}" method="post">
                @method("DELETE")
                @csrf
                <button class="float-end btn btn-danger">delete</button>
            </form>
            <a href="{{route('admin.users.edit',$user)}}" class="float-end btn btn-primary">update</a>
        </li>
        @endforeach
        
    </ul>
    @endif
    

</div>
</div>
@endsection