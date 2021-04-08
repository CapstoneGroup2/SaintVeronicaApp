@extends('layouts.app')

@section('title')
Classes
@endsection

@section('content')
<h2 style="text-align: left;">Classes</h2>
<div class="triangle-right" style="width:120px;"></div>
<hr> 
<?php $count = 1; ?>
@foreach($students_count as $student_count)
    @if($count%5 == 0 || $count==1)
        <div class="row">
    @endif
        @if($count == 1)
            <div class="col">
                <div class="card card-home btn-addClass" style="height: 120px !imporant;">
                    <img class="card-img-top" src="{{ URL::to('/images/students.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-text text-danger" style="font-size: 21px !important;"><span class="glyphicon glyphicon-plus"></span> Add Class</h2>
                        <h3>----------------</h3>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
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
            
        @if($count >= 5 && $count == count($students_count) + 1)
            <?php
                $remainingColumn = 4 - count($students_count)%4;
                for($i = 1; $i < $remainingColumn; $i++) {
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

<div id="addClassModal" class="modal fade" role="dialog" style="margin-top: 130px;">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="enrollment-form" action="/classes" method="post">
            @csrf
            <div class="modal-header">
                <h2 class="modal-title">Add Class</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <br>    
            <div class="modal-body">
                <div class="form-group">
                    <label for="class_name">Class Name</label>
                    <input type="text" class="form-control" name="class_name">
                </div>
                <div class="form-group">
                    <label for="class_description">Class Description</label>
                    <input type="text" class="form-control" name="class_description">
                </div>
            </div>
            <br>    
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-lg btn-success">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>
    
@endsection

@section('script')

<script>

$(document).ready(function() {
    $(document).on('click', '.btn-addClass', function() {
        $('#addClassModal').modal('show');
    });
});

</script>

@endsection