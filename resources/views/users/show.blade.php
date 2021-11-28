@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">{{ $users[0]->role }}</h2>
    @if($users[0]->id == 1)
        <div class="triangle-right" style="width:230px;"></div>
    @else
        <div class="triangle-right" style="width:160px;"></div>
    @endif
</div>
<hr>
<form id="enrollment-form" style="text-align:center;">
    <h2 class="text-warning">User Profile Information</h2> 
    <hr>
    <br>
    <div class="form-group">
        <p style="font-size:15px;">Full Name : <span class="text-white">{{ $users[0]->first_name }} {{($users[0]->middle_name != "") ? $users[0]->middle_name . " " : ""}}{{ $users[0]->last_name }}</span><p>
    </div>
    <div class="form-group">
        <p style="font-size:15px;">Role Name : <span class="text-white">{{ $users[0]->role }}</span><p>
    </div>
    <div class="form-group">
        <p style="font-size:15px;">Email Address : <span class="text-white">{{ $users[0]->email }}</span><p>
    </div>
    @if($users[0]->address != '')
        <div class="form-group">
            <p style="font-size:15px;">Address : <span class="text-white">{{ $users[0]->address }}</span><p>
        </div>
    @endif
    @if($users[0]->contact != '')
        <div class="form-group">
            <p style="font-size:15px;">Contact : <span class="text-white">{{ $users[0]->contact }}</span><p>
        </div>
    @endif
    @if($users[0]->gender != '')
        <div class="form-group">
            <p style="font-size:15px;">Gender : <span class="text-white">{{ $users[0]->gender }}</span><p>
        </div>
    @endif
    @if($users[0]->status != '')
        <div class="form-group">
            <p style="font-size:15px;">Status : <span class="text-white">{{ $users[0]->status }}</span><p>
        </div>
    @endif
    <hr>
    <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Cancel</a> 
    <a href="/users/{{ $users[0]->id }}/edit" class="btn btn-lg btn-warning" role="button">Edit</a>

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
