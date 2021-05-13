@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')

@if ($errors->has('amount_paid'))
  <script>
    $(document).ready(function() {
      $('#paymentModal').modal('show');
    });
  </script>
@endif

<div class="sticky">
    <h2 style="text-align: left">ID Number: {{ session()->get('student_id') }}</h2>
    <div class="triangle-right" style="width:290px;"></div>
</div>
<hr>
<form id="enrollment-form" action="/payments/{{ session()->get('student_id') }}" method="POST">
    {{method_field('PATCH')}}
    @csrf
    <h2 class="text-warning">Miscellaneous and Other Fees</h1> 
    <hr>
    <table class="table table-default table-bordered text-white">
        <thead>
            <th width="20%" style="text-align:center;border: 1px solid white;padding: 3px;">Payment Code</th>
            <th style="text-align:center;border: 1px solid white;padding: 3px;">Description</th>
            <th width="20%" style="text-align:center;border: 1px solid white;padding: 3px;">Amount</th>
        </thead>
        <tbody>
            @foreach($miscellaneous_and_other_fees as $miscellaneous_and_other_fee)
                <tr>
                    <td width="20%" class="text-white" style="text-align:left;border: 1px solid white;padding: 3px;">{{ $miscellaneous_and_other_fee->item_code }}</td>
                    <td class="text-white" style="text-align:left;border: 1px solid white;padding: 3px;">{{ $miscellaneous_and_other_fee->item_description }}</td>
                    <td width="20%" class="text-white" style="text-align:right;border: 1px solid white;padding: 3px;">{{ number_format($miscellaneous_and_other_fee->item_price, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td style="text-align: right;border: 1px solid white;padding: 3px;"></td>
                <td class="text-white" style="text-align: right;border: 1px solid white;padding: 3px;">TOTAL PAYABLES</th>
                <td class="text-white" style="text-align: right;border: 1px solid white;padding: 3px;">{{ number_format($payments[0]->total_payables, 2) }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="right">
        <a href="/students/{{ session()->get('student_id') }}" class="btn btn-lg btn-danger" role="button">Not now</a>
        <button type="button" class="btn btn-lg btn-warning btn-payment">Pay Bill</button>
    </div>

    <div id="paymentModal" class="modal fade" role="dialog" style="margin-top: 130px;">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #3f704d;">
                <div class="modal-header">
                    <h2 class="modal-title">Payment</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <br>    
                <br>
                <br>
                <div class="modal-body" style="padding: 0 25%;">
                    <div class="form-group">
                        <label for="amount_paid">Paid Amount</label>
                        <input type="number" class="form-control" name="amount_paid">
                        @if ($errors->has('amount_paid'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('amount_paid')}}</p>
                        </span>
                        @endif
                    </div>
                </div>
                <br>    
                <br>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection

@section('script') 
<script>
$(document).ready(function() {
    $(document).on('click', '.btn-payment', function() {
        $('#paymentModal').modal('show');
    });
});
</script>
@endsection