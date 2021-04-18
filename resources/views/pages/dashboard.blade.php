@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">Dashboard</h2>
    <div class="triangle-right" style="width:180px;"></div>
</div>
<hr>

<?php $count = 1; ?>
@foreach($students_count as $student_count)
    @if($count%5 == 0 || $count==1)
        <div class="row">
    @endif
        <div class="col">
            <div class="card card-home">
                <a[p] href="/students/classes/{{ $student_count['class_id'] }}">
                     <div class="card-body">
                        <h2 class="card-text text-success">{{ $student_count['class_name'] }}</h2>
                        <h3 class="card-text text-danger">{{ $student_count['class_count'] }} students</h3>
                    </div>
                </a>
            </div>
        </div>
        @if($count >= 5 && $count == count($students_count))
            <?php
                $remainingColumn = 4 - count($students_count)%4;
                for($i = 1; $i <= $remainingColumn; $i++) {
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
        <div class="card">
            <div id="gender-pie-chart">
            
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div id="classes-pie-chart">
            
            </div>
        </div>
    </div>
</div>

<!-- <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Charts</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col">
                <div id="gender-pie-chart">
                
                </div>
            </div>
            <div class="col">
                <div id="classes-pie-chart">
                
                </div>
            </div>
        </div>
        <div id="enrollees-per-year-pie-chart">
        
        </div>
    </div>
</div> -->

@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var analytics_gender = <?php echo $gender; ?>;
    var analytics_classes = <?php echo $classes; ?>;
    // var analytics_enrollees = <?php //echo $enrollees; ?>;

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

        // var data = google.visualization.arrayToDataTable(analytics_enrollees);
        // var options = 
        // {
        //     title: 'Percentage of Different Classes Student',
        //     curveType: 'function',
        //     legend: { position: 'bottom' }
        // };
        // var chart = new google.visualization.LineChart(document.getElementById('enrollees-per-year-pie-chart'));
        // chart.draw(data, options);
    }
</script>

@endsection