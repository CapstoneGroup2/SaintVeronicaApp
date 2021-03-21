@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            <h2 style="margin: 15px 0px 0px 10px;">Announcements</h2> 
        </div>
        <div class="col-3   ">
            <button role="button" class="btn btn-lg btn-add" style= "margin:15px 0px 7px 675px;">Add Announcements</button>
        </div>
    </div>
    <hr>
    @foreach($announcements as $announcements)
    <div class= "row">
        <div class="col">
            <div class="card card-home" style= "margin: 35px 45px 10px 85px;">
                <div class="card-body">
                    <h2 class="card-text text-danger">{{ $announcements -> announcement_title }}</h2>
                    <h4 class="card-text text-info" style= "text-align:left; margin:20px 0px 25px 19px">{{ $announcements -> announcement_message}}</h4>
                    <a href="#" class="btn btn-md btn-warning" role="button">Edit</a>
                    <button class="btn btn-md btn-danger btn-remove">Remove</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection