@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
@endsection

@section('content')


@if ($errors->has('class_id'))
  <script>
    $(document).ready(function() {
      $('#admissionModal').modal('show');
    });
  </script>
@endif

<?php echo '<script>var payments = ' . $payments . ';</script>'; ?>

<div class="sticky">
  <h2 style="text-align: left">{{ session()->get('present_class_name') }} Students</h2>
</div>
<button id="btn-add" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Enroll Student</button> 
<button id="btn-import" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-import"></span> Import Students</button> 
<button id="btn-export" class="btn btn-lg btn-secondary"><span class="glyphicon glyphicon-export"></span> Export Students</button> 
<hr>

@if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        {{session()->get('success')}}
    </div>
@endif

@if(session()->has('error_message'))
    <div class="alert alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        {{session()->get('error_message')}}
    </div>
@endif

<table id="dataTable" class="table table-striped table-enrollment table-default">
  <thead>
      <tr>
        <th class="sticky" scope="col" style="top: 120px !important;" width="10%">ID No.</th>
        <th class="sticky" scope="col" style="top: 120px !important;">Full Name</th>
        <th class="sticky" scope="col" style="top: 120px !important;">Email Address</th>
        <th class="sticky" scope="col" style="top: 120px !important;">Address</th>
        <th class="sticky" scope="col" style="top: 120px !important;">Contact</th>
        <th class="sticky" scope="col" style="top: 120px !important;">Action</th>
      </tr>
  </thead>
</table>

<div id="loader" class="text-center" style="margin-top: 50px;">
  <div class="spinner-border" style="width: 10rem; height: 10rem;font-size: 25px;" role="status">
    <span class="sr-only">Loading...</span>
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
        <h4 align="center" style="margin:0;">Are you sure you want to remove <span id="idnum" class="text-black" style="font-weight: bold;"></span> ID Number?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" id="btn-ok" class="btn btn-lg btn-danger">OK</button>
      </div>
    </div>
  </div>
</div>

<div id="admissionModal" class="modal fade" role="dialog" style="padding-top: 130px;">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #3f704d;">
      <form id="enrollment-form" method="POST">
        {{method_field('PATCH')}}
        @csrf
        <div class="modal-header">
          <h2 class="modal-title">For Admission</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <br>
        <div class="modal-body" style="padding: 0 25%;">
          <input id="student_id" name="student_id" type="int" style="display: none;">
          <div class="form-group">
            <br>
            <label for="class_id" style="font-size: 1.8rem !important;">Admission to:</label>
            <select class="form-control" name="class_id" style="font-size: 1.8rem !important;">
              <option value="">Select class</option>
              @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
              @endforeach
            </select>
            @if ($errors->has('class_id'))
              <span class="invalid feedback" role="alert">
                  <p style="color:tomato;">{{$errors->first('class_id')}}</p>
              </span>
            @endif
            <br>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="/js/student.js"></script>
@endsection