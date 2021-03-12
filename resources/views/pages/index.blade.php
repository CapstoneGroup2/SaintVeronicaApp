@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/2">
                <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-text text-danger">{{ $students["nursery"]->count() }}</h2>
                    <h5 class="card-text">Nursery Students</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/3">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["nursery2"]->count() }}</h2>
                <h5 class="card-text">Nursery 2 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/4">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["kinder1"]->count() }}</h2>
                <h5 class="card-text">Kinder 1 Students</h5>
            </div>
            </a>
        </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/5">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["kinder2"]->count() }}</h2>
                <h5 class="card-text">Kinder 2 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/6">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["grade1"]->count() }}</h2>
                <h5 class="card-text">Grade 1 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/7">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["grade2"]->count() }}</h2>
                <h5 class="card-text">Grade 2 Students</h5>
            </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/8">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["grade3"]->count() }}</h2>
                <h5 class="card-text">Grade 3 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/9">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["grade4"]->count() }}</h2>
                <h5 class="card-text">Grade 4 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/10">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["grade5"]->count() }}</h2>
                <h5 class="card-text">Grade 5 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/gradelevels/11">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["grade6"]->count() }}</h2>
                <h5 class="card-text">Grade 6 Students</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/tutorials/2">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["musicTutees"]->count() }}</h2>
                <h5 class="card-text">Music Tutees</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-home">
            <a href="/students/tutorials/2">
            <img class="card-img-top" src="{{ URL::to('/images/classroom.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-text text-danger">{{ $students["pianoTutees"]->count() }}</h2>
                <h5 class="card-text">Piano Tutees</h5>
            </div>
            </a>
        </div>
    </div>
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
