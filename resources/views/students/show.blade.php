@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
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
    <h2 style="text-align: left">ID Number: {{ $student->id }}</h2>
    <div class="triangle-right" style="width:290px;"></div>
</div>
<hr>
<form id="enrollment-form" action="/payments/{{ $student->id }}" method="POST">
    {{method_field('PATCH')}}
    @csrf
    <h2 class="text-warning">Student Profile Information</h2> 
    <hr>
    
    <div class="row">
        <div class="col-4">
            <div class="form-group center" style="padding:10px;">
                <img src='/images/students/{{ $student->student_image }}' height="243px" width="220px">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <p style="font-size:15px;">Full Name : <span class="text-white">{{ $student->student_first_name }} {{($student->student_middle_name != "") ? $student->student_middle_name . " " : ""}}{{ $student->student_last_name }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Email Address : <span class="text-white">{{ $student->student_email }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Address : <span class="text-white">{{ $student->student_address }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Contact : <span class="text-white">{{ $student->student_home_contact }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Birthdate : <span class="text-white">{{ date('jS \of F Y', strtotime($student->student_birth_date)) }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Age : <span class="text-white">{{ $student->student_age }} yrs. old</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Gender : <span class="text-white">{{ $student->student_gender }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Mother's Name : <span class="text-white">{{ $student->student_mother_name }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Mother's Contact Number : <span class="text-white">{{ $student->student_mother_contact_number }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Father's Name : <span class="text-white">{{ $student->student_father_name }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Father's Contact Number : <span class="text-white">{{ $student->student_father_contact_number }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Guardian's Name : <span class="text-white">{{ $student->student_guardian_name }}</span></p>
            </div>
            <div class="form-group">
                <p style="font-size:15px;">Guardian's Contact Number : <span class="text-white">{{ $student->student_guardian_contact_number }}</span></p>
            </div>
        </div>
    </div>

    <hr>

    <div class="right">
        <a href="/students/classes/{{ session()->get('present_class_id') }}" class="btn btn-lg btn-danger">Back  </a>
        <a href="/students/{{ $student->id }}/edit" class="btn btn-lg btn-warning" role="button">Edit</a>
    </div>

    <br><br><br>

    <div id="toPrint">
        <div class="row show shownArea">
            <h2 class="text-warning">Miscellaneous and Other Fees</h2> 
            <hr>
        </div>
        <div class="row hide hiddenArea">
            <table style="border: none;">
                <tbody>
                    <tr>
                        <td>ST. VERONICA LEARNING CENTER</td>
                    </tr>
                    <tr>
                        <td>Bantug St., Maasin City, Southern Leyte</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">PAYMENT RECEIPT</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td>ID No.: {{ $student->id }}</td>
                    </tr>
                    <tr>
                        <td>Pupil Name: <span style="font-weight: bold; text-transform: uppercase;">{{ $student->student_first_name }} {{($student->student_middle_name != "") ? $student->student_middle_name . " " : ""}}{{ $student->student_last_name }}&emsp;&emsp;&emsp;&emsp;</td>
                        <td>Date: {{ date('Y-m-d h:i:sa', strtotime("+8 Hours")) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display: block;">
            <table id="paymentTable" class="table table-default table-bordered" style="width: 100%; border: 1px solid white;border-collapse: collapse;">
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
                    <tr>
                        <td style="text-align: right;border: 1px solid white;padding: 3px;"></td>
                        <td class="text-white" style="text-align: right;border: 1px solid white;padding: 3px;">AMOUNT PAID</th>
                        <td class="text-white" style="text-align: right;border: 1px solid white;padding: 3px;">{{ number_format($payments[0]->amount_paid, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;border: 1px solid white;padding: 3px;"></td>
                        <td style="text-align: right;border: 1px solid white;padding: 3px; font-weight: bold; color: white !important;">BALANCE DUE</th>
                        <td style="text-align: right;border: 1px solid white;padding: 3px; font-weight: bold; color: white !important;">{{ number_format($payments[0]->balance_due, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        <p>*This receipt is not valid as an official receipt.</p>
        </div>
        <div class="row hide hiddenArea">
            <table>
                <tbody>
                    <tr>
                        <td>Reviewed by:</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td>___________________________</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;<span style="text-transform: uppercase;">{{ Auth::user()->user_first_name }} {{ Auth::user()->user_last_name }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="printHistory">
        <div class="row hide hiddenArea">
            <table style="border: none;">
                <tbody>
                    <tr>
                        <td>ST. VERONICA LEARNING CENTER</td>
                    </tr>
                    <tr>
                        <td>Bantug St., Maasin City, Southern Leyte</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">PAYMENT HISTORY</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td>ID No.: {{ $student->id }}</td>
                    </tr>
                    <tr>
                        <td>Pupil Name: <span style="font-weight: bold; text-transform: uppercase;">{{ $student->student_first_name }} {{($student->student_middle_name != "") ? $student->student_middle_name . " " : ""}}{{ $student->student_last_name }}&emsp;&emsp;&emsp;&emsp;</td>
                        <td>Date: {{ date('Y-m-d h:i:sa', strtotime("+8 Hours")) }}</td>
                    </tr>
                    <tr>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    @if(isset($histories[0]))
                        @foreach($histories as $history)
                            <tr>
                                <td>{{ date('jS \of F Y', strtotime($history->date_paid)) }} - {{ number_format($history->amount_paid, 2) }} - Received by {{ $history->user_first_name }} {{ $history->user_last_name }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No history of payments found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <?php echo '<script>$balance_due = ' . $payments[0]->balance_due . ';</script>'; ?>

    <hr>
    <div class="right">
        <button type="button" class="btn btn-lg btn-success btn-printReceipt">Print Receipt</button> 
        <button type="button" class="btn btn-lg btn-primary btn-printHistory">Print Payments</button> 
        @if ($payments[0]->balance_due > 0)
            <button type="button" class="btn btn-lg btn-warning btn-payment">Pay Bill</button> 
        @else
            <button type="button" class="btn btn-lg btn-warning btn-payment hide">Pay Bill</button> 
        @endif
    </div>

    <div id="paymentModal" class="modal fade" role="dialog" style="padding-top: 130px;">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #3f704d;">
                <form id="enrollment-form" action="/payments/{{ $student->id }}" method="POST">
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
                            <input id="amount_paid" type="number" class="form-control" name="amount_paid" value="{{ old('amount_paid') }}">
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
                        <button id="btn-submit" type="button" class="btn btn-lg btn-success">Submit</button>
                        <button id="submit" type="submit" class="hide">Submit</button>
                    </div>
                </form>
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

        $(document).on('click', '#btn-submit', function() {
            if ($('#amount_paid').val() > $balance_due) {
                alert('Amount paid should not be greater than the balance due!');
            } else {
                $('#submit').click();
            }
        });

        $('.btn-printReceipt').on('click', function(){
            $('.hiddenArea').show();
            $('.shownArea').hide();
            var html="<html>";
            html+= document.getElementById('toPrint').innerHTML;
            html+="</html>";

            while(html.includes("white")) {
                html = html.replace('white', 'black');
            }
            while(html.includes("display: block;")) {
                html = html.replace('display: block;', 'display:block;margin: 50px;');
            }

            var printWin = window.open();
            printWin.document.write(html);
            printWin.document.close();
            printWin.focus();
            printWin.print();
            printWin.close();
        });

        $('.btn-printHistory').on('click', function(){
            $('.hiddenArea').show();
            var html="<html>";
            html+= document.getElementById('printHistory').innerHTML;
            html+="</html>";

            while(html.includes("white")) {
                html = html.replace('white', 'black');
            }
            while(html.includes("display: block;")) {
                html = html.replace('display: block;', 'display:block;margin: 50px;');
            }
            var printWin = window.open();
            printWin.document.write(html);
            printWin.document.close();
            printWin.focus();
            printWin.print();
            printWin.close();
        });
    });
    
</script>

@endsection
