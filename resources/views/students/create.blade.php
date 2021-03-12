@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
<form id="enrollment-form" action="/students" method="post">
<h1>Enrollment Form</h1> 
<p>for Nursery Students</p>
<?php
    if (session()->get('category') == 'gradeLevel') {
    }
?>
<hr>
@csrf
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" name="student_first_name" placeholder="first name" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Middle Name</label>
                <input type="text" class="form-control" name="student_middle_name" placeholder="middle name" value="{{ old('middle_name') }}">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Last Name</label>
                <input type="text" class="form-control" name="student_last_name" placeholder="last name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="student_email" placeholder="name@example.com">
            </div>
        </div>
        <div class="col-5">    
            <div class="form-group">
                <label for="contact">Home Contact Number</label>
                <input type="text" class="form-control" name="student_home_contact" placeholder="+639">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="address">Home Address</label>
        <input type="text" class="form-control" name="student_address" placeholder="present address">
    </div>
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" name="student_birth_date">
            </div>
        </div>  
        <div class="col-2">    
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="student_age">
            </div>
        </div>
        <div class="col-3">    
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="student_gender">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="student_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row" style="display: none">
        @if(session()->get('category') == 'gradeLevel')
            <select class="form-control" name="grade_level_id">
                <option value="{{session()->get('category_id')}}" selected>{{session()->get('category_id')}}</option>
            </select>
            <label for="status">Tutorial</label>
            <select class="form-control" name="tutorial_id">
                <option value="1" selected>1</option>
            </select>
        @elseif(session()->get('key') == 'tutorial')
            <select class="form-control" name="grade_level_id">
                <option value="{{session()->get('category_id')}}" selected>{{session()->get('category_id')}}</option>
            </select>
            <select class="form-control" name="tutorial_id">
                <option value="{{session()->get('category_id')}}" selected>{{session()->get('category_id')}}</option>
            </select>
        @endif
    </div>
    <hr>
    <div class="right">
        <a href="/students" class="btn btn-lg btn-danger" role="button">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/student.js') }}"></script>
@endsection
