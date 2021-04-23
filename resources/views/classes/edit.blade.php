@extends('layouts.app')

@section('title')
Classes
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">Classes</h2> 
    <div class="triangle-right" style="width:110px;"></div>
</div>
<hr>
<form id="enrollment-form" action="/classes/{{ $class->id }}" method="post" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @csrf
    <h2 class="text-warning">Edit Class</h2>
    <hr>
    <div class="form-group" style="margin: 0 30%;">
        <label for="status">Class Name</label>
        <input type="text" class="form-control" name="class_name" value="{{ $class->class_name }}">
        @if ($errors->has('class_name'))
            <span class="invalid feedback" role="alert">
                <p style="color:tomato;">{{$errors->first('class_name')}}</p>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group" style="margin: 0 30%;">
        <label for="status">Class Description</label>
        <input type="text" class="form-control" name="class_description" value="{{ $class->class_description }}" >
        @if ($errors->has('class_description'))
            <span class="invalid feedback" role="alert">
                <p style="color:tomato;">{{$errors->first('class_description')}}</p>
            </span>
        @endif
    </div>
    <br>
    <hr>
    <div class="right">
        <a href="/classes" class="btn btn-lg btn-danger">Cancel</a>    
        <button type="submit" class="btn btn-lg btn-success">Update</button>
    </div>
</form>


@endsection

@section('script')  

@endsection