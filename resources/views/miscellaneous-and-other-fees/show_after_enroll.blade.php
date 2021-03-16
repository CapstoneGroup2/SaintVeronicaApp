@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<form id="enrollment-form">
    <h1>Miscellaneous and Other Fees</h1> 
    <?php
        if (session()->get('category') == 'grade-levels') {
            echo '<h5>for ' . session()->get("gradeLevelName") . ' Students</h5>';
        } else if (session()->get('category') == 'tutorials') {
            echo '<h5>for ' . session()->get("tutorialName") . ' Students</h5>';
        }
    ?>
    <hr>
    <div style="color: white">
        <div class="row">
            <div class="col-4">
                <h3>Name</h3>
            </div>
            <div class="col">
                <h3>Description</h3>
            </div>
            <div class="col-2">
                <h3>Price</h3>
            </div>
        </div>
        <?php $total = 0; ?>
        @foreach($miscellaneous_and_other_fees as $miscellaneous_and_other_fee)
        <div class="row">
            <div class="col-4">
                <p>{{ $miscellaneous_and_other_fee->miscellaneous_and_other_fee_name }}</p>
            </div>
            <div class="col">
                <p>{{ $miscellaneous_and_other_fee->miscellaneous_and_other_fee_description }}</p>
            </div>
            <div class="col-2">
                <p>{{ $miscellaneous_and_other_fee->miscellaneous_and_other_fee_price }} pesos</p>
                <?php $total += $miscellaneous_and_other_fee->miscellaneous_and_other_fee_price; ?>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col">
                <h3 style="letter-spacing: 5px;"> - - - - - - - - - - - - TOTAL - - - - - - - - - - - - -</h3>
            </div>
            <div class="col-2">
                <h3>{{ $total }} pesos</h3>
                <script>$total = {{ $total }}</script>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col"></div>
        <div class="col-3">
            <label for="amount_paid">Amount Paid</label>
            <input class="form-control" type="text" name="amount_paid" id="amount_paid">
        </div>
        <div class="col-3">
            <label for="amount_due">Amount Due</label>
            <input class="form-control" type="text"  name="amount_due" value="{{ $total }}" id="amount_due" readOnly>
        </div>
    </div>
    <div class="right">
        <a href="/miscellaneous-and-other-fees" class="btn btn-lg btn-danger" role="button">Not now</a>
        <a href="/miscellaneous-and-other-fees/1/edit" class="btn btn-lg btn-warning" role="button">Pay Bill</a>
    </div>
    </form>
@endsection

@section('script')  
<script>

    $('#amount_paid').change(function() {
        $total -= $(this).val();
        $('#amount_due').val($total);
    });
</script>
@endsection