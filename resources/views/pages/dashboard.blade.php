@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<h2 style="text-align: left">Dashboard</h2>
<div class="triangle-right" style="width:180px;">
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="card card-home" style="border-radius: 50%;">
                <a href="/students">
                <br>
                    <img class="card-img-top" src="{{ URL::to('/images/students.jpg') }}" width="100px" height="150px" alt="Card image cap" style="border-radius: 50%;">
                     <div class="card-body">
                        <h2 class="card-text text-success">Students</h2>
                        <h3 class="card-text text-danger">{{ count($students_classes) }} students</h3>
                    </div>
                </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home" style="border-radius: 50%;">
                <a href="/classes">
                    <br>
                    <img class="card-img-top" src="{{ URL::to('/images/classroom.jfif') }}" width="100px" height="150px" alt="Card image cap" style="border-radius: 50%;">
                     <div class="card-body">
                        <h2 class="card-text text-success">Classes</h2>
                        <h3 class="card-text text-danger">{{ count($classes) }} classes</h3>
                    </div>
                </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home" style="border-radius: 50%;">
                <a href="">
                    <br>
                    <img class="card-img-top" src="{{ URL::to('/images/payments.png') }}" width="70px" height="125px" alt="Card image cap" style="border-radius: 50%;">
                     <div class="card-body">
                        <h2 class="card-text text-success">Complete<br>Payment</h2>
                        <h3 class="card-text text-danger">100 students</h3>
                    </div>
                </a>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection