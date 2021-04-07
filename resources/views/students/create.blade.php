@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
@endsection

@section('content')

<h2 style="text-align: left">{{ session()->get('present_class_name') }} Students</h2> 
<hr>

<form id="enrollment-form" action="/students" method="post" enctype="multipart/form-data">
    <h2 class="text-warning">Enrollment Form</h2> 
    <hr>
    @csrf

    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" name="student_first_name" placeholder="first name" value="{{ old('student_first_name') }}">
                @if ($errors->has('student_first_name'))
                <span class="invalid feedback"role="alert">
                    <p style="color:tomato">{{ $errors->first('student_first_name') }}</p>
                </span>
                @endif
            </div>
        </div>

        <div class="col">    
            <div class="form-group">
                <label for="First Name">Middle Name</label>
                <input type="text" class="form-control" name="student_middle_name" placeholder="middle name" value="{{ old('student_middle_name') }}" >
            </div>
        </div>
        
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Last Name</label>
                <input type="text" class="form-control" name="student_last_name" placeholder="last name" value="{{ old('student_last_name') }}" >
                @if ($errors->has('student_last_name'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{ $errors->first('student_last_name') }}</p>
                </span>
                @endif
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="student_email" placeholder="name@example.com" value="{{ old('student_email') }}" >
                @if ($errors->has('student_email'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{ $errors->first('student_email') }}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="contact">Home Contact Number</label>
                <input type="text" class="form-control" name="student_home_contact" placeholder="+639" value="{{ old('student_home_contact') }}" >
                @if ( $errors->has('student_home_contact'))
                <span class="invalid feedback" roles="alert">
                    <p style="color:tomato;">{{ $errors->first('student_home_contact') }}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="image">Profile Picture</label>
                <input type="file" name="student_image" class="form-control image">
            </div>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="address">Home Address</label>
        <input type="text" class="form-control" name="student_address" placeholder="present address" value="{{ old('student_address') }}" >
        @if ( $errors->has('student_address'))
        <span class="invalid feedback" role="alert">
            <p style=color:tomato;>{{ $errors->first('student_address') }}</p>
        </span>
        @endif
    </div>

    <br>

    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" name="student_birth_date" value="{{ old('student_birth_date') }}" >
                @if ( $errors->has('student_birth_date'))
                <span class="invalid feedback" role="alert">
                    <p style=color:tomato;>{{ $errors->first('student_birth_date') }}</p>
                </span>
                @endif
            </div>
        </div>  
        <div class="col-2">    
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="student_age" value="{{ old('student_age') }}" >
                @if ($errors->has('student_age'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_age')}}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col-3">    
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="student_gender" value="{{ old('student_gender') }}" >
                    <option value="">Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
                @if ($errors->has('student_gender'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_gender')}}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="student_status" value="{{ old('student_status') }}" >
                    <option value="">Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
                @if ($errors->has('student_status'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_status')}}</p>
                </span>
                @endif
            </div>
        </div>
    </div>

    <hr>
    
    <div class="right">
        <a href="/students/classes/{{ session()->get('present_class_id') }}" role="button" class="btn btn-lg btn-danger">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
    </div>
    
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/student.js') }}"></script>
@endsection