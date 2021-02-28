@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
  @foreach($students as $student)
    <form id="enrollment-form" action="/students/{{ $student->id }}" method="POST">
      {{method_field('PATCH')}}
      <div class="title-id">
        <label>Student ID Number : <span>{{ $student->id }}</span></label>
      </div>
      <hr>
      @csrf
        <div class="row">
            <div class="col">    
                <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" class="form-control" name="student_first_name" value="{{ $student->student_first_name }}" >
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="First Name">Middle Name</label>
                    <input type="text" class="form-control" name="student_middle_name" value="{{ $student->student_middle_name }}" >
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="First Name">Last Name</label>
                    <input type="text" class="form-control" name="student_last_name" value="{{ $student->student_last_name }}" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="student_email" value="{{ $student->student_email}}" >
                </div>
            </div>
            <div class="col-5">    
                <div class="form-group">
                    <label for="contact">Home Contact Number</label>
                    <input type="text" class="form-control" name="student_home_contact" value="{{ $student->student_home_contact }}" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Home Address</label>
            <input type="text" class="form-control" name="student_address" value="{{ $student->student_address }}" >
        </div>
        <div class="row">
            <div class="col">    
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" name="student_birth_date" value="{{ $student->student_birth_date }}" >
                </div>
            </div>  
            <div class="col-2">    
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="student_age" value="{{ $student->student_age }}" >
                </div>
            </div>
            <div class="col-3">    
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="student_gender" >
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="student_status" >
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="right">
            <a href="/students" class="btn btn-lg btn-danger" role="button">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success">Update</button>
        </div>
    </form>
  @endforeach
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
