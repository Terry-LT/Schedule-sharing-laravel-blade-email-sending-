@extends('layouts.admin')
@section('title')
Update Schedule File
@endsection
@section('content')
<div class="container">
<div class="mt-5">
    <form action="{{route('admin.scheduleFiles.edit',$scheduleFile)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <input type="text" name="name" 
            class="form-control @error('name') border-danger @enderror" 
            placeholder="File Name" value="{{$scheduleFile->name}}">
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="course">Choose a Course:</label>
            <select class="form-select" name="course" id="course">
                <option @if ($scheduleFile->course == 'freshman') selected @endif value="freshman">Freshman</option>
                <option @if ($scheduleFile->course == 'sophomore') selected @endif value="sophomore">Sophomore</option>
                <option @if ($scheduleFile->course == 'junior') selected @endif value="junior">Junior</option>
                <option @if ($scheduleFile->course == 'senior') selected @endif value="senior">Senior</option>
                <option @if ($scheduleFile->course == 'null') selected @endif value="null">null</option>
            </select>
            @error('course')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload File</label>
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
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
</div>
@endsection