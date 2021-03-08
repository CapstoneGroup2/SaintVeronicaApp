@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Nursery Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Nursery 2 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Kinder 1 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Kinder 2 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Grade 1 Students</strong>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Grade 2 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Grade 3 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Grade 4 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Grade 5 Students</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Grade 6 Students</strong>
            </div>
        </div>
    </div>
</div><div class="row">
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Music Tutees</strong>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <strong class="card-text">Piano Tutees</strong>
            </div>
        </div>
    </div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
</div>

<div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-success">
               <div class="panel-heading"><b>Charts</b></div>
               <div class="panel-body">
                   <canvas id="canvas" height="280" width="600"></canvas>
               </div>
           </div>
       </div>
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-success">
               <div class="panel-heading"><b>Charts</b></div>
               <div class="panel-body">
                   <canvas id="canvas" height="280" width="600"></canvas>
               </div>
           </div>
       </div>
</div>
@endsection

@section('script')
  <script src="{{ URL::to('/js/dashboard.js') }}"></script>
@endsection
