@extends('layouts.app')

@section('content')
<h2>Enrollment Form</h2> 
<hr>
<form id="enrollment-form" action="/enrollees" method="post">
@csrf
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="first name">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" placeholder="middle name">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Last Name</label>
                <input type="text" class="form-control" id="last_name" placeholder="last name">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="email" class="form-control" id="address" placeholder="present address">
    </div>
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate">
            </div>
        </div>  
        <div class="col-2">    
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age">
            </div>
        </div>
        <div class="col-3">    
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender">
                    <option selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status">
                    <option selected>Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
        </div>
    </div>
    <div class="right">
        <a href="{{ route('enrollees') }}" class="btn btn-lg btn-danger btn-cancel" role="button">Cancel</a>
        <button type="submit" class="btn btn-lg btn-primary btn-submit">Submit</button>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/enrollees.js') }}"></script>
@endsection
