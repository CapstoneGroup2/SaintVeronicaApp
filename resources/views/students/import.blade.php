@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
<div class="sticky">
    <h2 style="text-align: left">{{ session()->get('present_class_name') }} Students</h2>
</div>
<hr>
<form id="enrollment-form" action="/students/classes/import" method="POST" enctype="multipart/form-data" style="text-align: center;">
    @csrf
    <h2 class="text-warning">Import CSV File Data</h2>
    <hr>
        @if(session()->has('error_message'))
            <div class="alert alert-danger">
                <button class="close" type="button" data-dismiss="alert">x</button>
                {{session()->get('error_message')}}
            </div>
        @endif
    <br>
    <div class="form-group" style="margin: 0 35%;">
        <input type="file" name="upload_students" class="form-control image">
        @if ($errors->has('upload_students'))
            <span class="invalid feedback" role="alert">
                <p style="color:tomato;">{{$errors->first('upload_students')}}</p>
            </span>
        @endif
    </div>
    <br>
    <hr>
    <a href="/students/classes/{{ session()->get('present_class_id') }}" class="btn btn-lg btn-danger ">Cancel</a>
    <button type="submit" class="btn btn-lg btn-success">Upload</button>
</form>
@endsection

@section('script')  
@endsection
