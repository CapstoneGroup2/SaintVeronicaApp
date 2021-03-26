@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<h2 style="text-align: left">{{ $users[0]->role_name }}</h2>
<div class="triangle-right" style="width:230px;"></div>
<hr>
<form id="enrollment-form">
    <h1 class="text-warning">User Profile Information</h1> 
    <hr>
    <div class="row">
        <div class="col-3">
            <div class="form-group center">
                <img src='/images/users/{{ $users[0]->user_image }}' height="200px" width="200px">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <h3>Full Name : </h3>
            </div>
            <div class="form-group">
                <h3>Email Address : </h3>
            </div>
            <div class="form-group">
                <h3>Address : </h3>
            </div>
            <div class="form-group">
                <h3>Contact : </h3>
            </div>
            <div class="form-group">
                <h3>Gender : </h3>
            </div>
            <div class="form-group">
                <h3>Status : </h3>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <h3 class="text-white"><i>{{ $users[0]->user_first_name }} {{ $users[0]->user_last_name }}</i></h3>
            </div>
            <div class="form-group">
                <h3 class="text-white"><i>{{ $users[0]->user_email }}</i></h3>
            </div>
            <div class="form-group">
                <h3 class="text-white"><i>{{ $users[0]->user_address }}</i></h3>
            </div>
            <div class="form-group">
                <h3 class="text-white"><i>{{ $users[0]->user_contact }}</i></h3>
            </div>
            <div class="form-group">
                <h3 class="text-white"><i>{{ $users[0]->user_gender }}</i></h3>
            </div>
            <div class="form-group">
                <h3 class="text-white"><i>{{ $users[0]->user_status }}</i></h3>
            </div>
        </div>
    </div>
    <hr>
    
    <div class="right">
        <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Cancel</a>
        <a href="/users/{{ $users[0]->id }}/edit" class="btn btn-lg btn-warning" role="button">Edit</a>
    </div>

</form>
@endsection

@section('script')  
<script>
$(document).ready(function() {
    $(document).on('click', '.btn-payment', function() {
        $('#paymentModal').modal('show');
    });
});
</script>
@endsection
