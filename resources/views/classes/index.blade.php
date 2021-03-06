@extends('layouts.app')

@section('title')
Classes
@endsection

@section('content')

@if ($errors->has('class_name') || $errors->has('class_description'))
  <script>
    $(document).ready(function() {
      $('#addClassModal').modal('show');
    });
  </script>
@endif

<h2 style="text-align: left;">Classes</h2>
<div class="triangle-right" style="width:120px;"></div>
<hr> 

@if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        {{session()->get('success')}}
    </div>
@endif

<?php $count = 0; ?>
@foreach($students_count as $student_count)
    @if($count==1 || $count==0)
        <div class="row">
    @endif
    @if($count == 0)
        <div class="col">
            <a>
                <div class="card card-home btn-addClass">
                    <div class="card-body">
                        <h2 class="card-text text-danger" style="font-size: 21px !important;"><span class="glyphicon glyphicon-plus"></span> Add Class</h2>
                    </div>
                </div>
            </a>
        </div>
        <?php $count+=2; ?>
    @endif
    <div class="col">
        <div id="{{ $student_count['class_count'] }}" class="card card-home">
            <a href="/students/classes/{{ $student_count['class_id'] }}">
                    <div class="card-body">
                        <h2 class="card-text text-success">{{ $student_count['class_name'] }}</h2>
                        <h3 class="card-text text-danger">{{ $student_count['class_count'] }} students</h3>
                    </div>
            </a>
            <div id="{{ $student_count['class_name'] }}" class="card-footer text-center">
                <a href="/classes/{{ $student_count['class_id'] }}/edit" class="btn btn-md btn-warning" role="button"><span class="glyphicon glyphicon-pencil"></span></a>
                <button id="{{ $student_count['class_id'] }}" class="btn btn-md btn-danger btn-remove"><span class="glyphicon glyphicon-trash"></span></button>
            </div>
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

<div id="addClassModal" class="modal fade" role="dialog" style="margin-top: 130px;">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="enrollment-form" action="/classes" method="post" style="padding: 10px 50px;">
            @csrf
            <div class="modal-header">
                <h2 class="modal-title">Add Class</h2>
            </div>
            <div class="modal-body">
                <br>
                <div class="form-group">
                    <label for="class_name">Class Name</label>
                    <input type="text" class="form-control" name="class_name" placeholder="Class Name">
                    @if ($errors->has('class_name'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('class_name')}}</p>
                    </span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label for="class_description">Class Description</label>
                    <input type="text" class="form-control" name="class_description" placeholder="Class Description">
                    @if ($errors->has('class_description'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('class_description')}}</p>
                    </span>
                    @endif
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-lg btn-success">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Confirmation</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to delete <br><span id="className" class="text-success"></span> class?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" id="btn-ok" class="btn btn-lg btn-danger">OK</button>
      </div>
    </div>
  </div>
</div>
    
@endsection

@section('script')

<script src="/js/class.js"></script>

@endsection