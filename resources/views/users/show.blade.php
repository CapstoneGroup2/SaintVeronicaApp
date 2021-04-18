@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">{{ $users[0]->role_name }}</h2>
    <div class="triangle-right" style="width:230px;"></div>
</div>
<hr>
<form id="enrollment-form">
    <h2 class="text-warning">User Profile Information</h2> 
    <hr>
    <div class="row">
        <div class="col-4">
            <div class="form-group center">
                <img src='/images/users/{{ $users[0]->user_image }}' height="200px" width="200px">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <p style="font-size:13px;">Full Name : <span class="text-white">{{ $users[0]->user_first_name }} {{($users[0]->user_middle_name != "") ? $users[0]->user_middle_name . " " : ""}}{{ $users[0]->user_last_name }}</span><p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Role Name : <span class="text-white">{{ $users[0]->role_name }}</span><p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Email Address : <span class="text-white">{{ $users[0]->user_email }}</span><p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Address : <span class="text-white">{{ $users[0]->user_address }}</span><p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Contact : <span class="text-white">{{ $users[0]->user_contact }}</span><p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Gender : <span class="text-white">{{ $users[0]->user_gender }}</span><p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Status : <span class="text-white">{{ $users[0]->user_status }}</span><p>
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
