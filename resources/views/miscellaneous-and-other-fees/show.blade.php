@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<div class="sticky">
    <h2 style="text-align: left">Item Code : {{ $miscellaneous_and_other_fees[0]->item_code }}</h2> 
</div>
<hr>
<form id="enrollment-form" style="text-align:center;">
    <h2 class="text-warning">Miscellaneous And Other Fee Information</h2>
    <br>
    <div class="form-group">
        <img src='/images/items/{{ $miscellaneous_and_other_fees[0]->item_image }}' height="200px">
    </div>
    <br>
    <div class="form-group">
        <p class="text-warning" style="font-size: 1.5rem;">Item Code: <span class="text-white">{{ $miscellaneous_and_other_fees[0]->item_code }}</span></p>
    </div>
    <br>
    <div class="form-group">
        <p class="text-warning" style="font-size: 1.5rem;">Item Description: <span class="text-white">{{ $miscellaneous_and_other_fees[0]->item_description }}</span></h3>
    </div>
    <br>
    <div class="form-group">
        <p class="text-warning" style="font-size: 1.5rem;">Item Price: <span class="text-white">{{ number_format($miscellaneous_and_other_fees[0]->item_price, 2) }}</span></h3>
    </div>
    <br>
    <div class="center">
        @if(Auth::user()->role_id == 1) 
            <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Cancel</a>   
            <a href="/miscellaneous-and-other-fees/{{ $miscellaneous_and_other_fees[0]->id }}/edit" role="button" class="btn btn-lg btn-warning">Edit</a>
        @else
            <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Go Back</a>   
        @endif
    </div>
</form>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
