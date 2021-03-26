@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<h2 style="text-align: left">{{ session()->get('present_class_name') }} Class</h2> 
<hr>
<form id="enrollment-form" action="/miscellaneous-and-other-fees" method="post" enctype="multipart/form-data">
    <h1>Add Miscellaneous and Other Fees</h1> 
    <hr>
    @csrf
    <div class="form-group">
        <label for="status">Item Code</label>
        <input type="text" class="form-control" name="item_code" placeholder="code of item">
    </div>
    <div class="form-group">
        <label for="status">Item Description</label>
        <input type="text" class="form-control" name="item_description" placeholder="description of item">
    </div>
    <div class="form-group">
        <label for="status">Item Price</label>
        <input type="text" class="form-control" name="item_price" placeholder="price of item">
    </div>
    <div class="form-group">
        <label for="status">Item Image</label>
        <input type="file" class="form-control" name="item_image" placeholder="image of item">
    </div>
    <div class="right">
        <a href="{{url()->previous()}}" class="btn btn-lg btn-danger" role="button">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/student.js') }}"></script>
@endsection
