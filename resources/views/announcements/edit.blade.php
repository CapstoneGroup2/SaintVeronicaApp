@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')

<div id="addModal" class="modal fade show" role="dialog" style="margin-top: 70px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="enrollment-form" action="/announcements/{{ $announcement->id }}" method="post" enctype="multipart/form-data" style="padding: 50px">
        {{method_field('PATCH')}}  
        @csrf
        <div class="modal-header">
            <h2 class="text-warning">Edit Announcement</h2> 
        </div>
        <div class="modal-body">
            <br>
            <div class="form-group">
                <label for="status">Announcement Title</label>
                <input type="text" class="form-control" name="announcement_title" value="{{ $announcement->announcement_title }}">
                @if ($errors->has('announcement_title'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('announcement_title')}}</p>
                    </span>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="status">Announcement Message</label>
                <textarea type="text" class="form-control" rows="5" name="announcement_message">{{ $announcement->announcement_message }}</textarea>
                @if ($errors->has('announcement_message'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('announcement_message')}}</p>
                    </span>
                @endif
            </div>
            <br>
        </div>
        <div class="modal-footer">
            <a href="/announcements" class="btn btn-lg btn-danger">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('script')  

@endsection