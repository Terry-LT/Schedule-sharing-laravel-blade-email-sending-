@extends('layouts.admin')
@section('title')
Add schedule file
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('admin.scheduleFiles.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" 
            class="form-control @error('name') border-danger @enderror" 
            placeholder="File Name" value="{{old('name')}}">
            @error('name')
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
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control @error('scheduleFile') border-danger @enderror" name="scheduleFile" type="file" id="formFile">
            @error('scheduleFile')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
          </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" name="send_notification_email" id="send_notification_email">
            <label class="form-check-label" for="send_notification_email">
              Send Notification Email
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" name="send_notification_telegram" id="send_notification_telegram">
            <label class="form-check-label" for="send_notification_telegram">
              Send Telegram Notification
            </label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
</div>
@endsection