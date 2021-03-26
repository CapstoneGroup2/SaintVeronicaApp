@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<h2 style="text-align: left">Miscellaneous and Other Fee : {{ $miscellaneous_and_other_fees[0]->item_code }}</h2> 
<hr>
<form id="enrollment-form" style="text-align:center;">
    <div class="form-group">
        <img src='/images/items/{{ $miscellaneous_and_other_fees[0]->item_image }}' height="200px">
    </div>
    <br>
    <div class="form-group">
        <h3>Item Code: <u style="letter-spacing: 2px;">{{ $miscellaneous_and_other_fees[0]->item_code }}</u></h3>
    </div>
    <br>
    <div class="form-group">
        <h3>Item Description: <u style="letter-spacing: 2px;">{{ $miscellaneous_and_other_fees[0]->item_description }}</u></h3>
    </div>
    <br>
    <div class="form-group">
        <h3>Item Price: <u style="letter-spacing: 2px;">{{ number_format($miscellaneous_and_other_fees[0]->item_price, 2, '.', 0) }}</u></h3>
    </div>
    <br>
    <div class="center">
        <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Cancel</a>    
        <a href="/miscellaneous-and-other-fees/{{ $miscellaneous_and_other_fees[0]->id }}/edit" role="button" class="btn btn-lg btn-warning">Edit</a>
    </div>
</form>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
