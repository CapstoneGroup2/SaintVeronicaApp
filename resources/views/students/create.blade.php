@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">{{ session()->get('present_class_name') }} Students</h2> 
    <hr>
</div>

<form id="enrollment-form" action="/students" method="post" enctype="multipart/form-data">
    <div class="sticky" style="top: 142px !important; background-color: #3f704d !important">
        <h2 class="text-warning">Enrollment Form</h2> 
        <hr>
    </div>
    @csrf

    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" name="student_first_name" value="{{ old('student_first_name') }}">
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
                <input type="text" class="form-control" name="student_middle_name" value="{{ old('student_middle_name') }}" >
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="First Name">Last Name</label>
                <input type="text" class="form-control" name="student_last_name" value="{{ old('student_last_name') }}" >
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
                <input type="email" class="form-control" name="student_email" value="{{ old('student_email') }}" >
                @if ($errors->has('student_email'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{ $errors->first('student_email') }}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col-5">    
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" name="student_home_contact" value="{{ old('student_home_contact') }}" >
                @if ( $errors->has('student_home_contact'))
                <span class="invalid feedback" roles="alert">
                    <p style="color:tomato;">{{ $errors->first('student_home_contact') }}</p>
                </span>
                @endif
            </div>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="address">Home Address</label>
        <input type="text" class="form-control" name="student_address" value="{{ old('student_address') }}" >
        @if ( $errors->has('student_address'))
        <span class="invalid feedback" role="alert">
            <p style=color:tomato;>{{ $errors->first('student_address') }}</p>
        </span>
        @endif
    </div>

    <br>

    <div class="row">
        <div class="col-3">    
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
        <div class="col">    
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
                <label for="image">Profile Picture</label>
                <input type="file" name="student_image" class="form-control image">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col"> 
            <div class="form-group">
                <label for="mother">Mother's Name</label>
                <input type="text" class="form-control" name="student_mother_name" value="{{ old('student_mother_name') }}" >
                @if ($errors->has('student_mother_name'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_mother_name')}}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="mother">Mother's Contact Number</label>
                <input type="text" class="form-control" name="student_mother_contact_number" value="{{ old('student_mother_contact_number') }}">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col"> 
            <div class="form-group">
                <label for="student_father_name">Father's Name</label>
                <input type="text" class="form-control" name="student_father_name" value="{{ old('student_father_name') }}" >
                @if ($errors->has('student_father_name'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_father_name')}}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="student_father_contact_number">Father's Contact Number</label>
                <input type="text" class="form-control" name="student_father_contact_number" value="{{ old('student_father_contact_number') }}">
                @if ($errors->has('student_father_contact_number'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_father_contact_number')}}</p>
                </span>
                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col"> 
            <div class="form-group">
                <label for="student_guardian_name">Guardian's Name</label>
                <input type="text" class="form-control" name="student_guardian_name" value="{{ old('student_guardian_name') }}" >
                @if ($errors->has('student_guardian_name'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_guardian_name')}}</p>
                </span>
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="student_guardian_contact_number">Guardian's Contact Number</label>
                <input type="text" class="form-control" name="student_guardian_contact_number" value="{{ old('student_guardian_contact_number') }}">
                @if ($errors->has('student_guardian_contact_number'))
                <span class="invalid feedback" role="alert">
                    <p style="color:tomato;">{{$errors->first('student_guardian_contact_number')}}</p>
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