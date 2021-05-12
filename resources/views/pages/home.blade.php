@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="sticky">
    <h2 style="text-align: left">Home Page</h2>
    <div class="triangle-right" style="width:190px;"></div>
</div>
<hr>
<?php $count = 1; ?>
@foreach($students_count as $student_count)
    @if($count==1)
        <div class="row">
    @endif
        <div class="col">
            <div class="card card-home">
                <a href="/students/classes/{{ $student_count['class_id'] }}">
                    <img class="card-img-top" src="{{ URL::to('/images/students.jpg') }}" alt="Card image cap">
                     <div class="card-body">
                        <h2 class="card-text text-success">{{ $student_count['class_name'] }}</h2>
                        <h3 class="card-text text-danger">{{ $student_count['class_count'] }} students</h3>
                    </div>
                </a>
            </div>
        </div>
        <?php $count++; ?>
        @if($count == 5)
            </div>
            <?php $count = 1; ?>
        @endif
    @endforeach

    @if($count < 5)
        <?php
            for($i = $count; $i < 5; $i++) {
                echo '<div class="col"></div>';
                ++$count;
            }
        ?> 
        </div>           
    @endif
    
@endsection

@section('script')
@endsection