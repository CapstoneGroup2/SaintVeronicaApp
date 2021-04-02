@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<h2 style="text-align: left">{{ session()->get('new_student_name') }} ({{ session()->get('present_class_name') }} Student)</h2>
<hr>
<form id="enrollment-form" action="/payments/{{ session()->get('new_student_id') }}" method="POST">
    {{method_field('PATCH')}}
    @csrf
    <h1>Miscellaneous and Other Fees</h1> 
    <hr>
    <table class="table table-default table-bordered text-white">
        <thead>
            <th width="20%">Item Code</th>
            <th width="65%">Item Description</th>
            <th>Item Price</th>
        </thead>
        <tbody>
            @foreach($miscellaneous_and_other_fees as $miscellaneous_and_other_fee)
                <tr>
                    <td>{{ $miscellaneous_and_other_fee->item_code }}</td>
                    <td>{{ $miscellaneous_and_other_fee->item_description }}</td>
                    <td>{{ number_format($miscellaneous_and_other_fee->item_price, 2, '.', '') }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td colspan="2" style="text-align: center">T O T A L  &emsp; P A Y M E N T</th>
                <td>{{ number_format($payments[0]->amount_payable, 2, '.', '') }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="right">
        <a href="/students/{{ session()->get('new_student_id') }}" class="btn btn-lg btn-danger" role="button">Not now</a>
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
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount_paid">Paid Amount</label>
                        <input type="number" class="form-control" name="amount_paid" required>
                    </div>
                </div>
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