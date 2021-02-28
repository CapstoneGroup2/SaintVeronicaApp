@extends('layouts.app')


@section('title')
Items
@endsection

@section('content')
<form id="enrollment-form" action="/item" method="post">
    <h1>Add Item</h1> 
    <hr>
    @csrf
    <div class="form-group">
        <label for="status">Year Level</label>
        <select class="form-control" name="year_level">
            <option value="none" selected>Select year level</option>
            <option value="Nursery">Nursery</option>
            <option value="Nursery Kinder1">Nursery 1</option>
            <option value="Kinder 1">Kinder 1</option>
            <option value="Kinder 2">Kinder 2</option>
            <option value="Grade 1">Grade 1</option>
            <option value="Grade 2">Grade 2</option>
            <option value="Grade 3">Grade 3</option>
            <option value="Grade 4">Grade 4</option>
            <option value="Grade 5">Grade 5</option>
            <option value="Grade 6">Grade 6</option>
        </select>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" name="item_name" placeholder="name of item">
            </div>
        </div>
        <div class="col-8">    
            <div class="form-group">
                <label for="contact">Item Description</label>
                <input type="text" class="form-control" name="item_description" placeholder="description of item">
            </div>
        </div>
        <div class="col-2">    
            <div class="form-group">
                <label for="contact">Item Price</label>
                <input type="number" class="form-control" name="item_price">
            </div>
        </div>
    </div>
    <hr>
    <div class="right">
        <a href="/item" class="btn btn-lg btn-danger" role="button">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/student.js') }}"></script>
@endsection
