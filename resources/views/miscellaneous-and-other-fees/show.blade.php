@extends('layouts.app')

@section('content')
  @foreach($students as $student)
    <form id="enrollment-form" action="" method="">
      <div class="title-id">
        <label>Student ID Number : <span>{{ $student->id }}</span></label>
      </div>
    <hr>
    @csrf
        <div class="row">
            <div class="col">    
                <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $student->student_first_name }}" readonly>
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="First Name">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" value="{{ $student->student_middle_name }}" readonly>
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="First Name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $student->student_last_name }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $student->student_email}}" readonly>
                </div>
            </div>
            <div class="col-5">    
                <div class="form-group">
                    <label for="contact">Home Contact Number</label>
                    <input type="text" class="form-control" name="contact" value="{{ $student->student_home_contact }}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Home Address</label>
            <input type="text" class="form-control" name="address" value="{{ $student->student_address }}" readonly>
        </div>
        <div class="row">
            <div class="col">    
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" value="{{ $student->student_birth_date }}" readonly>
                </div>
            </div>  
            <div class="col-2">    
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" value="{{ $student->student_age }}" readonly>
                </div>
            </div>
            <div class="col-3">    
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" readonly>
                        <option selected>{{ $student->student_gender }}</option>
                    </select>
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" readonly>
                        <option selected>{{ $student->student_status }}</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="right">
            <a href="/students" class="btn btn-lg btn-danger btn-close" role="button">Cancel</a>
            <a href="/students/{{ $student->id }}/edit" class="btn btn-lg btn-warning" role="button">Edit</a>
        </div>
    </form>
  @endforeach
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
