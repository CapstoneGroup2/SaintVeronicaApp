@extends('layouts.app')

@section('title')
School Year
@endsection

@section('content')

@if ($errors->has('school_year'))
  <script>
    $(document).ready(function() {
      $('#addSchoolYearModal').modal('show');
    });
  </script>
@endif

<div class="sticky">
    <h2 style="text-align: left">List of School Year</h2> 
    <div class="triangle-right" style="width:290px;"></div>
</div>
<hr>

@if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        {{session()->get('success')}}
    </div>
@endif

<?php $count = 0; ?>
@foreach(array_reverse($list_of_school_year_and_students) as $school_year_and_students)
    @if($count==1 || $count==0)
        <div class="row">
    @endif
    @if($count == 0)
        <div class="col">
            <a>
                <div class="card card-home btn-addSchoolYear">
                    <div class="card-body">
                        <h2 class="card-text text-danger" style="font-size: 21px !important;"><span class="glyphicon glyphicon-plus"></span> School Year</h2>
                    </div>
                </div>
            </a>
        </div>
        <?php $count+=2; ?>
    @endif
    <div class="col">
        <div class="card card-home">
            <a href="/students/school-year/{{ $school_year_and_students['school_year_id'] }}">
                <div class="card-body">
                    <h2 class="card-text text-success">S.Y. {{ $school_year_and_students['school_year'] }}</h2>
                </div>
            </a>
            <div id="{{ $school_year_and_students['school_year'] }}" class="card-footer text-center">
                <h4>{{ $school_year_and_students['students_count'] }} students</h4>
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

<div id="addSchoolYearModal" class="modal fade" role="dialog" style="margin-top: 130px;">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="enrollment-form" action="/school-year" method="post" style="padding: 10px 50px;">
            @csrf
            <div class="modal-header">
                <h2 class="modal-title">Add School Year</h2>
            </div>
            <div class="modal-body">
                <br>
                <div class="form-group">
                    <label for="school_year">School Year</label>
                    <input type="text" class="form-control" name="school_year" placeholder="YYYY">
                    @if ($errors->has('school_year'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('school_year')}}</p>
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

@endsection

@section('script')

<script src="/js/school-year.js"></script>

@endsection