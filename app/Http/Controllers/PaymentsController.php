<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentsHistory;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;

class PaymentsController extends Controller
{
    public function history()
    {
        $histories = DB::table('payments_histories')
            ->join('students', 'students.id', '=', 'payments_histories.student_id')
            ->join('users', 'users.id', '=', 'payments_histories.user_id')
            ->orderBy('payments_histories.id', 'desc')
            ->get();
            
        if (request()->ajax())
        {
            return datatables()->of($histories)
                ->addColumn('date_paid', function($data) {
                    return date("l, jS \of F Y", strtotime($data->date_paid));
                })
                ->addColumn('student_name', function($data) {
                    $full_name = $data->student_first_name . ' ' . $data->student_last_name;
                    return $full_name;
                })
                ->addColumn('amount_paid', function($data) {
                    return number_format($data->amount_paid, 2, '.', '');
                })
                ->addColumn('user_name', function($data) {
                    $full_name = $data->user_first_name . ' ' . $data->user_last_name;
                    return $full_name;
                })
                ->rawColumns(['date_paid', 'student_name', 'user_name'])
                ->make(true);
        }

        return view('pages.history', compact('histories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $student_id)
    {
        $payment = Payment::where('student_id', $student_id)->get();
        $payment[0]->amount_paid = $payment[0]->amount_paid + $request['amount_paid'];
        $payment[0]->amount_due = $payment[0]->amount_due - $request['amount_paid'];
        $payment[0]->save();

        $history = new PaymentsHistory();
        $history->student_id = $student_id;
        $history->user_id = Auth::user()->id;
        $history->amount_paid = $request['amount_paid'];
        $history->date_paid = new DateTime('now');
        $history->save();

        return redirect('/students/' . $student_id);
    }

    public function destroy($id)
    {
        //
    }
}
