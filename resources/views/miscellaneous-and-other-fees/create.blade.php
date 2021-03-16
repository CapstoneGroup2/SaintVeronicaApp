@extends('layouts.app')


@section('title')
Items
@endsection

@section('content')
<form id="enrollment-form" action="/miscellaneous-and-other-fees" method="post">
    <h1>Add Miscellaneous and Other Fees</h1> 
    <?php
        if (session()->get('category') == 'grade-levels') {
            echo '<h5>for ' . session()->get("gradeLevelName") . ' Students</h5>';
        } else if (session()->get('category') == 'tutorials') {
            echo '<h5>for ' . session()->get("tutorialName") . ' Students</h5>';
        }
    ?>
    <hr>
    @csrf
    <div class="form-group">
        <label for="status">Name</label>
        <input type="text" class="form-control" name="miscellaneous_and_other_fee_name" placeholder="name of item">
    </div>
    <div class="form-group">
        <label for="status">Description</label>
        <input type="text" class="form-control" name="miscellaneous_and_other_fee_description" placeholder="description of item">
    </div>
    <div class="form-group">
        <label for="status">Price</label>
        <input type="text" class="form-control" name="miscellaneous_and_other_fee_price" placeholder="price of item">
    </div>
    <div class="form-group">
        <label for="status">Image</label>
        <input type="text" class="form-control" name="miscellaneous_and_other_fee_image" placeholder="image of item">
    </div>
    <div class="row" style="display: none">
        @if(session()->get('category') == 'grade-levels')
            <select class="form-control" name="grade_level_id">
                <option value="{{session()->get('category_id')}}" selected>{{session()->get('category_id')}}</option>
            </select>
            <label for="status">Tutorial</label>
            <select class="form-control" name="tutorial_id">
                <option value="1" selected>1</option>
            </select>
        @elseif(session()->get('category') == 'tutorials')
            <select class="form-control" name="grade_level_id">
                <option value="1" selected>1</option>
            </select> 
            <select class="form-control" name="tutorial_id">
                <option value="{{session()->get('category_id')}}" selected>{{session()->get('category_id')}}</option>
            </select>
        @endif
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
