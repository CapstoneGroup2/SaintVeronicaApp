@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">Announcement</h2> 
    <div class="triangle-right" style="width:250px;"></div>
</div>
<form id="enrollment-form" action="/announcements/{{ $announcement->id }}" method="post" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @csrf
    <h2 class="text-warning">Edit Announcement</h2>
    <hr>
    <div class="form-group" style="margin: 0 30%;">
        <label for="status">Announcement Title</label>
        <input type="text" class="form-control" name="announcement_title" value="{{ $announcement->announcement_title }}">
        @if ($errors->has('announcement_title'))
            <span class="invalid feedback" role="alert">
                <p style="color:tomato;">{{$errors->first('announcement_title')}}</p>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group" style="margin: 0 30%;">
        <label for="status">Announcement Message</label>
        <textarea type="text" class="form-control" rows="8" name="announcement_message">{{ $announcement->announcement_message }}</textarea>
        @if ($errors->has('announcement_message'))
            <span class="invalid feedback" role="alert">
                <p style="color:tomato;">{{$errors->first('announcement_message')}}</p>
            </span>
        @endif
    </div>
    <br>
    <div class="right">
        <a href="/announcements" class="btn btn-lg btn-danger">Cancel</a>    
        <button type="submit" class="btn btn-lg btn-success">Update</button>
    </div>
</form>


@endsection

@section('script')  

@endsection