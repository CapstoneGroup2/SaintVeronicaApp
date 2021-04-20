@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
@foreach($students as $student)
    <div class="sticky">
        <h2 style="text-align: left">ID Number: {{ $student->id }}</h2>
        <div class="triangle-right" style="width:340px;"></div>
    </div>
    <br>  
    <form id="enrollment-form" action="/students/{{ $student->id }}" method="POST" enctype="multipart/form-data">
        {{method_field('PATCH')}}
        @csrf
        <h2 class="text-warning">Student Profile Information</h2> 
        <hr>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">First Name</label>
                            <input type="text" class="form-control" name="student_first_name" value="{{ $student->student_first_name }}" >
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
                            <input type="text" class="form-control" name="student_middle_name" value="{{ $student->student_middle_name }}" >
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">Last Name</label>
                            <input type="text" class="form-control" name="student_last_name" value="{{ $student->student_last_name }}" >
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
                            <input type="email" class="form-control" name="student_email" value="{{ $student->student_email}}" readonly>
                        </div>
                    </div>
                    <div class="col-5">    
                        <div class="form-group">
                            <label for="contact">Home Contact Number</label>
                            <input type="text" class="form-control" name="student_home_contact" value="{{ $student->student_home_contact }}" >
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
                    <input type="text" class="form-control" name="student_address" value="{{ $student->student_address }}" >
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
                            <input type="date" class="form-control" name="student_birth_date" value="{{ $student->student_birth_date }}" >
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
                            @if ($errors->has('student_gender'))
                            <span class="invalid feedback" role="alert">
                                <p style="color:tomato;">{{$errors->first('student_gender')}}</p>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"> 
                        <div class="form-group">
                            <label for="mother">Mother's Name</label>
                            <input type="text" class="form-control" name="student_mother_name" value="{{  $student->student_mother_name }}" >
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
                            <input type="text" class="form-control" name="student_mother_contact_number" value="{{  $student->student_mother_contact_number }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"> 
                        <div class="form-group">
                            <label for="student_father_name">Father's Name</label>
                            <input type="text" class="form-control" name="student_father_name" value="{{  $student->student_father_name }}" >
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
                            <input type="text" class="form-control" name="student_father_contact_number" value="{{  $student->student_father_contact_number }}">
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
                            <input type="text" class="form-control" name="student_guardian_name" value="{{ $student->student_guardian_name }}" >
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
                            <input type="text" class="form-control" name="student_guardian_contact_number" value="{{ $student->student_guardian_contact_number }}">
                            @if ($errors->has('student_guardian_contact_number'))
                            <span class="invalid feedback" role="alert">
                                <p style="color:tomato;">{{$errors->first('student_guardian_contact_number')}}</p>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="form-group center">
                    <br>
                    <label for="status">Student Profile Picture</label>
                    <br><br>
                    <img src='/images/students/{{ $student->student_image }}' height="200px" width="92%">
                    <br><br>
                    <input type="file" class="form-control image" name="student_image" style="width:92%">
                </div>
            </div>
        </div>
        
    <hr>

    <div class="right">
        <a href="/students/classes/{{ session()->get('present_class_id') }}" class="btn btn-lg btn-danger">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Update</button>
    </div>

    </form>

@endforeach

@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
