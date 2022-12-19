@extends('layouts.admin')
@section('title')
All Schedule Files
@endsection
@section('content')
<div class="container">
<a href="{{route('admin.scheduleFiles.create')}}">Add Schedule File</a>
<div>
    @if ($scheduleFiles->isEmpty())
        <div class="text-center">
            There is no schedule files
        </div>        
    @else
    <ul class="list-group mt-5">
        @foreach ($scheduleFiles as $scheduleFile)
        <li class="list-group-item">
            {{$scheduleFile->name}}
            <form action="{{route('admin.scheduleFiles.delete',$scheduleFile)}}" method="post">
                @method("DELETE")
                @csrf
                <button class="float-end btn btn-danger">delete</button>
            </form>
            <a href="{{route('admin.scheduleFiles.edit',$scheduleFile)}}" class="float-end btn btn-primary me-3">update</a>
          
            <form action="{{route('admin.scheduleFiles.download',$scheduleFile)}}" method="post">
                @csrf
                <button class="float-end btn btn-primary me-3" type="submit">download</button>
            </form>
            
        </li>
        @endforeach
        
    </ul>
    @endif
</div>
</div>
@endsection