@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
<h2>Table of Students</h2> 
  <table id="dataTable-students" class="table table-striped table-enrollment display">
    <hr>
    <div class="row">
      <div class="col">
        <a href="/students/create" role="button" class="btn btn-lg btn-add">Enroll Student</a>
      </div>
      <div class="col-7">
        <label class="search" for="search">Search/Filter:</label>
        <input id="search-input" name="search" type="text" class="btn btn-lg">
      </div>
      <div class="col">
        <label for="" class="entries">Entries per page</label>
        <select name="" id="filter-length" class="btn btn-lg" data-target="#dataTable-students">
          <option value="10">5</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      
    </div>
    <hr>
    <thead>
        <tr>
        <th scope="col">ID No.</th>
        <th scope="col">Full Name</th>
        <th scope="col">Email Address</th>
        <th scope="col">Home Address</th>
        <th scope="col">Home Contact</th>
        <th scope="col" class="center"></th>
        </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <tr id="{{ $student->id }}">
        <th>{{ $student->id }}</th>
        <td>{{ $student->student_first_name . ' ' . $student->student_middle_name . ' ' . $student->student_last_name }}</td>
        <td>{{ $student->student_email }}</td>
        <td>{{ $student->student_address }}</td>
        <td>{{ $student->student_home_contact }}</td>
        <td class="center">
          <a href="/students/{{ $student->id }}" class="btn btn-md btn-primary" role="button">View</a>
          <a href="/students/{{ $student->id }}/edit" class="btn btn-md btn-warning" role="button">Edit</a>
          <button class="btn btn-md btn-danger btn-remove">Remove</button>
        </td>
        </tr>
      @endforeach
        </tbody>
    </table>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
