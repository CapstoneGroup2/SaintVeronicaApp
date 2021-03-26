@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
<h2 style="text-align: left">Home Page</h2>
<div class="triangle-right" style="width:190px;">
</div>
<hr>
<?php $count = 1; ?>
@foreach($students_count as $student_count)
    @if($count%5 == 0 || $count==1)
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
        @if($count >= 5 && $count == count($students_count))
            <?php
                $remainingColumn = 4 - count($students_count)%4;
                for($i = 1; $i <= $remainingColumn; $i++) {
                    echo '<div class="col"></div>';
                    ++$count;
                }
            ?>            
        @endif
    @if($count%4 == 0)
        </div>
    @endif
    <?php $count++; ?>
@endforeach
    
@endsection

@section('script')
@endsection