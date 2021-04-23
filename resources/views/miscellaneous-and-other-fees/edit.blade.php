@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<h2 style="text-align: left">Miscellaneous and Other Fee : {{ $miscellaneous_and_other_fees[0]->item_code }}</h2> 
<hr>
<form id="enrollment-form" action="/miscellaneous-and-other-fees/{{ $miscellaneous_and_other_fees[0]->id }}" method="POST" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @csrf
    <h2 class="text-warning">Edit Item</h2>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="status">Item Code</label>
                <input type="text" class="form-control" name="item_code" placeholder="code of item" value="{{ $miscellaneous_and_other_fees[0]->item_code }}">
            </div>
            <div class="form-group">
                <label for="status">Item Description</label>
                <input type="text" class="form-control" name="item_description" placeholder="description of item" value="{{ $miscellaneous_and_other_fees[0]->item_description }}">
            </div>
            <div class="form-group">
                <label for="status">Item Price</label>
                <input type="text" class="form-control" name="item_price" placeholder="price of item" value="{{ $miscellaneous_and_other_fees[0]->item_price }}">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="status">Item Image</label>
                <br>
                <img src='/images/items/{{ $miscellaneous_and_other_fees[0]->item_image }}' height="163px">
                <input type="file" class="form-control" name="item_image" placeholder="image of item" style="width:200px">
            </div>
        </div>
    </div>
    
    <div class="right">
        <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Cancel</a>    
        <button type="submit" class="btn btn-lg btn-success">Update</button>
    </div>
</form>
@endsection

@section('script')  
    <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
