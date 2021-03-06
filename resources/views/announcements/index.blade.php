@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')

@if ($errors->has('announcement_title') || $errors->has('announcement_message'))
  <script>
    $(document).ready(function() {
      $('#addModal').modal('show');
    });
  </script>
@endif

<div class="sticky">
  <h2 style="text-align: left;">Announcements</h2> 

@if(isset(Auth::user()->user_email) && Auth::user()->role_id == 1)
</div>
  <button role="button" class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add Announcements</button>
@else
  <div class="triangle-right" style="width:250px;"></div>
</div>
@endif

<hr>

@if(session()->has('success'))
  <div class="alert alert-success">
    <button class="close" type="button" data-dismiss="alert">x</button>
    {{session()->get('success')}}
  </div>
@endif

@foreach($announcements as $announcement)
  <div id="{{ $announcement -> announcement_title }}" class="card text-center card-home" style="padding: 0;">
    <div class="card-header" style="padding: 10px 100px;">
      <h2 class="card-text text-success">{{ $announcement -> announcement_title }}</h2>
    </div>
    <div class="card-body" style="padding: 20px 150px;">
      <h4 class="card-text text-info">{{ $announcement -> announcement_message}}</h4>
    </div>
    <div class="card-footer text-muted" style="padding: 10px;">
      <p style="font-size: 1.4rem;">{{ date("l, jS \of F Y, h:i:s A", strtotime($announcement -> created_at)) }}</p>
      @if (isset(Auth::user()->user_email) && Auth::user()->role_id == 1)
        <a href="/announcements/{{ $announcement->id }}/edit" class="btn btn-lg btn-warning" role="button"><span class="glyphicon glyphicon-pencil"></span></a>
        <button id="{{ $announcement->id }}" class="btn btn-lg btn-danger btn-remove"><span class="glyphicon glyphicon-trash"></span></button>
      @endif
    </div>
  </div>
@endforeach

<div id="addModal" class="modal fade" role="dialog" style="margin-top: 70px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="enrollment-form" action="/announcements" method="post" enctype="multipart/form-data" style="padding: 50px">
        @csrf
        <div class="modal-header">
            <h2 class="text-warning">Add Announcement</h2> 
        </div>
        <div class="modal-body">
            <br>
            <div class="form-group">
                <label for="status">Announcement Title</label>
                <input type="text" class="form-control" name="announcement_title" value="{{ old('announcement_title') }}">
                @if ($errors->has('announcement_title'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('announcement_title')}}</p>
                    </span>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="status">Announcement Message</label>
                <textarea type="text" class="form-control" name="announcement_message" rows="5">{{ old('announcement_message') }}</textarea>
                @if ($errors->has('announcement_message'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('announcement_message')}}</p>
                    </span>
                @endif
            </div>
            <br>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-lg btn-danger" role="button">Cancel</button>
            <button type="submit" class="btn btn-lg btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Confirmation</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove <br><span id="title" class="text-success"></span> announcement?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" id="btn-ok" class="btn btn-lg btn-danger">OK</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')  

<script src="/js/announcement.js"></script>

@endsection