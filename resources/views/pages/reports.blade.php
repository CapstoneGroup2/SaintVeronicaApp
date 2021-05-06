@extends('layouts.app')

@section('title')
Reports
@endsection

@section('content')

<h2 style="text-align: left">Reports</h2>
<div class="triangle-right" style="width:120px;"></div>
<hr>

<?php $count = 1; ?>
@foreach($students_count as $student_count)
    @if($count%5 == 0 || $count==1)
        <div class="row">
    @endif
    @if($count == 1)
        <div class="col">
            <div class="card card-home">
                <div class="card-body">
                    <h3 class="card-text text-success">All Students
                        <button id="btn-export" class="btn btn-md btn-secondary"><span class="glyphicon glyphicon-export"></span> Export Students</button></h3>
                </div>
                <div class="card-footer text-muted">
                    <p style="font-size: 1.5rem;">Total Students: <span class="text-secondary" style="font-weight: bold;">{{ $total_count['total_students'] }}</span></p>
                    <p style="font-size: 1.5rem;">Male Students: <span class="text-primary" style="font-weight: bold;">{{ $total_count['total_male_students'] }}</span></p>
                    <p style="font-size: 1.5rem;">Female Students: <span class="text-danger" style="font-weight: bold;">{{ $total_count['total_female_students'] }}</span></p>
                </div>
            </div>
        </div>
        <?php $count++; ?>
    @endif
    <div class="col">
        <div class="card card-home">
            <a href="/students/classes/{{ $student_count['class_id'] }}">
                <div class="card-body">
                    <h3 class="card-text text-success">{{ $student_count['class_name'] }} Students</h3>
                </div>
                <div class="card-footer text-muted">
                    <p style="font-size: 1.5rem;">Total Students: <span class="text-secondary" style="font-weight: bold;">{{ $student_count['class_count'] }}</span></p>
                    <p style="font-size: 1.5rem;">Male Students: <span class="text-primary" style="font-weight: bold;">{{ $student_count['class_male'] }}</span></p>
                    <p style="font-size: 1.5rem;">Female Students: <span class="text-danger" style="font-weight: bold;">{{ $student_count['class_female'] }}</span></p>
                </div>
            </a>
        </div>
    </div>
    @if($count >= 5 && $count == count($students_count) + 1)
        <?php
            $remainingColumn = 4 - count($students_count)%4;
            for($i = 1; $i < $remainingColumn; $i++) {
                echo '<div class="col"></div>';
                ++$count;
            }
        ?>            
    @endif
    @if($count%4 == 0)
        </div>
    @endif
    <?php $count++; ?>
@endforeach

<div class="row">
    <div class="col">
        <div class="card card-home">
            <div id="gender-pie-chart">
            
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-home"   >
            <div id="classes-pie-chart">
            
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var analytics_gender = <?php echo $gender; ?>;
    var analytics_classes = <?php echo $classes; ?>;

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
        var data = google.visualization.arrayToDataTable(analytics_gender);
        var options = {title: 'Percentage of Male and Female Student'};
        var chart = new google.visualization.PieChart(document.getElementById('gender-pie-chart'));
        chart.draw(data, options);

        var data = google.visualization.arrayToDataTable(analytics_classes);
        var options = {title: 'Percentage of Different Classes Student'};
        var chart = new google.visualization.PieChart(document.getElementById('classes-pie-chart'));
        chart.draw(data, options);
    }

    $(document).ready(function() {

        $('#btn-export').click(function () {
            window.location = "/students/export";
        });
    })
</script>

@endsection