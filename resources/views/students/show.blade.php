@extends('layouts.app')

@section('title')
Students
@endsection

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
                    <input type="text" class="form-control" value="{{ $student->student_gender }}" readonly>
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="age" value="{{ $student->student_status }}" readonly>
                </div>
            </div>
        </div>
        <hr>
  @endforeach
  
  <h1>Miscellaneous and Other Fees</h1> 
    <?php
        if (session()->get('category') == 'grade-levels') {
            echo '<h5>for ' . session()->get("gradeLevelName") . ' Students</h5>';
        } else if (session()->get('category') == 'tutorials') {
            echo '<h5>for ' . session()->get("tutorialName") . ' Students</h5>';
        }
    ?>
    <hr>
    <div style="color: white">
        <div class="row">
            <div class="col-4">
                <h3>Name</h3>
            </div>
            <div class="col">
                <h3>Description</h3>
            </div>
            <div class="col-2">
                <h3>Price</h3>
            </div>
        </div>
        <?php $total = 0; ?>
        @foreach($miscellaneous_and_other_fees as $miscellaneous_and_other_fee)
        <div class="row">
            <div class="col-4">
                <p>{{ $miscellaneous_and_other_fee->miscellaneous_and_other_fee_name }}</p>
            </div>
            <div class="col">
                <p>{{ $miscellaneous_and_other_fee->miscellaneous_and_other_fee_description }}</p>
            </div>
            <div class="col-2">
                <p>{{ $miscellaneous_and_other_fee->miscellaneous_and_other_fee_price }} pesos</p>
                <?php $total += $miscellaneous_and_other_fee->miscellaneous_and_other_fee_price; ?>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col">
                <h3 style="letter-spacing: 5px;">T O T A L - - - - - - - - - - - - - - - - - - - - - - - </h3>
            </div>
            <div class="col-2">
                <h3>{{ $total }} pesos</h3>
                <script>$total = {{ $total }}</script>
            </div>
        </div>
    </div>
    <div class="right">
        <a href="/students" class="btn btn-lg btn-danger" role="button">Cancel</a>
        <a href="/students/{{ $student->id }}/edit" class="btn btn-lg btn-warning" role="button">Edit</a>
    </div>
</form>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
