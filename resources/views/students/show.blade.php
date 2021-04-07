@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
@endsection

@section('content')
<h2 style="text-align: left">{{ session()->get('present_class_name') }} Student</h2>
<hr>
<form id="enrollment-form" action="/payments/{{ $student->id }}" method="POST">
    {{method_field('PATCH')}}
    @csrf
    <h2 class="text-warning">Student Profile Information</h2> 
    <hr>
    
    <div class="row">
        <div class="col-4">
            <div class="form-group center">
                <img src='/images/students/{{ $student->student_image }}' height="243px" width="220px">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <p style="font-size:13px;">Full Name : <span class="text-white">{{ $student->student_first_name }} {{($student->student_middle_name != "") ? $student->student_middle_name . " " : ""}}{{ $student->student_last_name }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Email Address : <span class="text-white">{{ $student->student_email }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Address : <span class="text-white">{{ $student->student_address }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Contact : <span class="text-white">{{ $student->student_home_contact }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Birthdate : <span class="text-white">{{ $student->student_birth_date }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Age : <span class="text-white">{{ $student->student_age }} yrs. old</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Gender : <span class="text-white">{{ $student->student_gender }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:13px;">Status : <span class="text-white">{{ $student->student_status }}</span></p>
            </div>
        </div>
    </div>

    <hr>

    <div class="right">
        <a href="{{url()->previous()}}" class="btn btn-lg btn-danger">Cancel</a>
        <a href="/students/{{ $student->id }}/edit" class="btn btn-lg btn-warning" role="button">Edit</a>
    </div>

    <br><br><br>

    <div id="toPrint">
        <h2 class="text-warning">Miscellaneous and Other Fees</h2> 
        <hr>
        <table class="table table-default table-bordered" style="width: 100%; border: 1px solid white;border-collapse:collapse;">
            <thead>
                <th width="20%" style="text-align:left;border: 1px solid white;padding: 6px;">Item Code</th>
                <th style="text-align:left;border: 1px solid white;padding: 6px;">Item Description</th>
                <th width="20%" style="text-align:left;border: 1px solid white;padding: 6px;">Item Price</th>
            </thead>
            <tbody>
                @foreach($miscellaneous_and_other_fees as $miscellaneous_and_other_fee)
                    <tr>
                        <td width="20%" class="text-white" style="text-align:left;border: 1px solid white;padding: 6px;font-size: 13px !important;">{{ $miscellaneous_and_other_fee->item_code }}</td>
                        <td class="text-white" style="text-align:left;border: 1px solid white;padding: 6px;font-size: 13px !important;">{{ $miscellaneous_and_other_fee->item_description }}</td>
                        <td width="20%" class="text-white" style="text-align:left;border: 1px solid white;padding: 6px;font-size: 13px !important;">{{ number_format($miscellaneous_and_other_fee->item_price, 2, '.', '') }}</td>
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
                    <td class="text-white" colspan="2" style="text-align: center;border: 1px solid white;padding: 6px;padding: 6px;">T O T A L  &emsp; P A Y M E N T</th>
                    <td class="text-white" style="border: 1px solid white;padding: 6px;">{{ number_format($payments[0]->amount_payable, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td class="text-white" colspan="2" style="text-align: center;border: 1px solid white;padding: 6px;padding: 6px;">A M O U N T &emsp; P A I D</th>
                    <td class="text-white" style="border: 1px solid white;padding: 6px;">{{ number_format($payments[0]->amount_paid, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td class="text-white" colspan="2" style="text-align: center;border: 1px solid white;padding: 6px;padding: 6px;">A M O U N T &emsp; D U E</th>
                    <td class="text-warning" style="font-size: 20px !important;border: 1px solid white;padding: 6px;">{{ number_format($payments[0]->amount_due, 2, '.', '') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="row hide" id="signArea">
            <div class="col" style="text-align: center;">
                <h4 style="text-align: left;">Printed By :</h4>
                <h4>_____________________________________________</h4>
                <h4>{{ Auth::user()->user_first_name }} {{ Auth::user()->user_last_name }}
                    <?php
                        echo (Auth::user()->role_id == 1) ? '(Administrator)' : '(Registrar)';
                    ?>
                </h4>
            </div>
            <div class="col" style="text-align: center;">
                <h4 style="text-align: left;">Given to:</h4>
                <h4>_____________________________________________</h4>
                <h4>{{ $student->student_first_name }} {{ $student->student_last_name }} ({{ session()->get('present_class_name') }} Student)</h4>
            </div>
        </div>
    </div>

    <hr>
    <div class="right">
        <button type="button" class="btn btn-lg btn-warning btn-payment">Pay Bill</button> 
        <button type="button" class="btn btn-lg btn-success btn-print">Print Bill</button> 
    </div>

    <div id="paymentModal" class="modal fade" role="dialog" style="padding-top: 130px;">
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

$('.btn-print').on('click', function(){
    $('#signArea').show();
    var html="<html>";
    html+= document.getElementById('toPrint').innerHTML;
    html+="</html>";

    while(html.includes("white")) {
        html = html.replace('white', 'black');
    }

    console.log(html);
    var printWin = window.open();
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
});
</script>
@endsection
