@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
@endsection

@section('content')

<div class="sticky">
  <h2 style="text-align: left">School Year: {{ session()->get('selected_school_year_in_students_page') }}</h2>
    <div class="triangle-right" style="width:280px;"></div>
</div>

<?php $count = 1; ?>
@foreach($list_of_students_per_class as $students_per_class)
    @if($count==1 || $count==0)
        <div class="row">
    @endif
    <div class="col">
        <div class="card card-home">
            <a href="/students/classes/{{ $students_per_class['class_id'] }}">
                <div class="card-body">
                    <h2 class="card-text text-success">{{ $students_per_class['class_name'] }}</h2>
                </div>
            </a>
            <div id="{{ $students_per_class['class_name'] }}" class="card-footer text-center">
                @foreach($students_per_class['class_sections'] as $class_section)
                    <h4 class="text-info">Section {{ $class_section[0] }}: <span class="text-primary">{{ $class_section[1] === 0 ? 'None' : strval($class_section[1]) . ' students' }}</span></h4>
                @endforeach
            </div>
        </div>
    </div>
        <?php $count++; ?>
        @if($count == 5)
            </div>
            <?php $count = 1; ?>
        @endif
    @endforeach

@endsection

@section('script')    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="/js/student.js"></script>
@endsection