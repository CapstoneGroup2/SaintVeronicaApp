@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')

@if ($errors->has('item_code') || $errors->has('item_description') || $errors->has('item_price') || $errors->has('item_image'))
  <script>
    $(document).ready(function() {
      $('#addModal').modal('show');
    });
  </script>
@endif

<div class="sticky">
  <h2 style="text-align: left">{{ session()->get('present_class_name') }} Class</h2>
  @if(isset(Auth::user()->user_email) && Auth::user()->role_id == 1)
</div>
    <button class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add Miscellaneous</button> 
</div>
  @endif
<hr>

@if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        {{session()->get('success')}}
    </div>
@endif

<div>
  <table id="dataTable" class="table table-striped table-miscellaneous-and-other-fees table-default">
    <thead>
        <tr>
          <th scope="col">Item Image</th>
          <th scope="col">Item Code</th>
          <th scope="col">Item Description</th>
          <th scope="col">Item Price</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
  </table>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="modal-title">Confirmation</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove <span id="itemCode" class="text-dark" style="font-weight: bold;"></span> item code?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" id="btn-ok" class="btn btn-lg btn-danger">OK</button>
      </div>
    </div>
  </div>
</div>

<div id="addModal" class="modal fade" role="dialog" style="margin-top: 70px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="enrollment-form" action="/miscellaneous-and-other-fees" method="post" enctype="multipart/form-data" style="padding: 20px 50px">
        @csrf
        <div class="modal-header">
          <h2 class="text-warning">Add Item</h2> 
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="status">Item Code</label>
              <input type="text" class="form-control" name="item_code">
              @if ($errors->has('item_code'))
                <span class="invalid feedback" role="alert">
                  <p style="color:tomato;">{{$errors->first('item_code')}}</p>
                </span>
              @endif
          </div>
          <div class="form-group">
              <label for="status">Item Description</label>
              <input type="text" class="form-control" name="item_description">
              @if ($errors->has('item_description'))
                <span class="invalid feedback" role="alert">
                  <p style="color:tomato;">{{$errors->first('item_description')}}</p>
                </span>
              @endif
          </div>
          <div class="form-group">
              <label for="status">Item Price</label>
              <input type="text" class="form-control" name="item_price">
              @if ($errors->has('item_price'))
                <span class="invalid feedback" role="alert">
                  <p style="color:tomato;">{{$errors->first('item_price')}}</p>
                </span>
              @endif
          </div>
          <div class="form-group">
              <label for="status">Item Image</label>
              <input type="file" class="form-control image" name="item_image">
              @if ($errors->has('item_image'))
                <span class="invalid feedback" role="alert">
                  <p style="color:tomato;">{{$errors->first('item_image')}}</p>
                </span>
              @endif
          </div>
        </div>
        <div class="modal-footer">
          <div class="right">
              <button class="btn btn-lg btn-danger" role="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-lg btn-success">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection

@section('script')    
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
  <script src="/js/item.js"></script>
@endsection