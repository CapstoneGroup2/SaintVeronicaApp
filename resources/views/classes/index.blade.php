@extends('layouts.app')

@section('title')
Classes
@endsection

@section('content')
<h2 style="text-align: left;">Classes</h2>
<div class="triangle-right" style="width:120px;"></div>
<hr> 
<?php $count = 1; ?>
@foreach($classes as $class)
    @if($count%5 == 0 || $count==1)
        <div class="row">
    @endif
        @if($count == 1)
            <div class="col">
                <div class="card card-home btn-addClass">
                    <img class="card-img-top" src="{{ URL::to('/images/students.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-text text-danger" style=""><span class="glyphicon glyphicon-plus"></span> Add Class</h3>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
        @endif
            <div class="col">
                <div class="card card-home">
                    <img class="card-img-top" src="{{ URL::to('/images/students.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-text text-success">{{ $class->class_name }}</h3>
                    </div>
                </div>
            </div>
            
        @if($count >= 5 && $count == count($classes) + 1)
            <?php
                $remainingColumn = 4 - (count($classes) + 1)%4;
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