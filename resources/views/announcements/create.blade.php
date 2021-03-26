@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')
<form id="enrollment-form" action="/users" method="post">
<h1>Add User</h1> 
<p>User can be administrator or registrar</p>
<hr>
@csrf
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" name="user_first_name" placeholder="first name" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Middle Name</label>
                <input type="text" class="form-control" name="user_middle_name" placeholder="middle name" value="{{ old('middle_name') }}">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Last Name</label>
                <input type="text" class="form-control" name="user_last_name" placeholder="last name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="user_email" placeholder="name@example.com">
            </div>
        </div>
        <div class="col-5">    
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" name="user_contact" placeholder="+639">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="address">Home Address</label>
        <input type="text" class="form-control" name="user_address" placeholder="present address">
    </div>
    <div class="row">
        
    <div class="col">    
            <div class="form-group">
                <label for="user_role_id">User Role</label>
                <select class="form-control" name="user_role_id">
                    <option value="" selected>select user role</option>
                   @foreach($userRoles as $userRole)
                        <option value="{{ $userRole->id }}">{{ $userRole->user_role_name }}</option> 
                   @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">    
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="user_gender">
                    <option value="" selected>select gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="user_status">
                    <option value="" selected>select status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="right">
        <a href="/users" class="btn btn-lg btn-danger" role="button">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/student.js') }}"></script>
@endsection