@extends('layouts.app')

@section('title')
Reports
@endsection

@section('content')
<h2 style="text-align: left;">Reports</h2>
<div class="triangle-right" style="width:120px;"></div>
<br>     
@endsection

@section('script')
  <script src="{{ URL::to('/js/dashboard.js') }}"></script>
@endsection