@extends('layouts.app')

@section('content')
<h2>Enrollment Form</h2> 
<hr>
<form id="enrollment-form">
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" id="first-name" placeholder="first name">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Middle Name</label>
                <input type="text" class="form-control" id="first-name" placeholder="middle name">
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Last Name</label>
                <input type="text" class="form-control" id="first-name" placeholder="last name">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="present address">
    </div>
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="exampleFormControlSelect1">Birthdate</label>
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
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="right">
        <a href="{{ route('enrollees') }}" class="btn btn-lg btn-danger btn-cancel" role="button">Cancel</a>
        <a href="" class="btn btn-lg btn-primary btn-submit" role="button">Submit</a>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/enrollees.js') }}"></script>
@endsection
