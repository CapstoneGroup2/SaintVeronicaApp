<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MiscellaneousAndOtherFees;
use App\Models\Classes;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Auth;

class MiscellaneousAndOtherFeesController extends Controller
{
    public function showMiscellaneousAndOtherFees($id)
    {
        $classes = Classes::where('id' , $id)->get();

        session()->put('present_class_id', $id);
        session()->put('present_class_name', $classes[0]->class_name);

        $miscellaneous_and_other_fees = MiscellaneousAndOtherFees::where('class_id', $id)->get();

        if (request()->ajax())
        {
            if (Auth::user()->role_id == 1) {
                return datatables()->of($miscellaneous_and_other_fees)
                    ->addColumn('item_price', function($data){
                        return number_format($data->item_price, 2, '.', '');
                    }) 
                    ->addColumn('item_image', function($data){
                        if ($data->item_image != '') {
                            return '<img src="/images/items/'. $data->item_image . '"height="100px" style="margin-left: 10px;margin-right: auto;">';
                        }
                        return '<img src="/images/default.png" height="100px" alt="default">';
                    })  
                    ->addColumn('action', function($data) {
                        $button = '<a href="/miscellaneous-and-other-fees/'. $data->id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-search"></span></a>';
                        $button .= '<a href="/miscellaneous-and-other-fees/'. $data->id .'/edit" data-toggle="tooltip" title="Edit" class="btn btn-md btn-warning" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-pencil"></span></a>';
                        $button .= '<button type="button" id="'. $data->id . '" data-toggle="tooltip" title="Remove" class="btn btn-md btn-danger btn-remove" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-trash"></span></button>';
                        return $button;
                    })
                    ->rawColumns(['item_price', 'item_image', 'action'])
                    ->make(true);
            } else {
                return datatables()->of($miscellaneous_and_other_fees)
                    ->addColumn('item_price', function($data){
                        return number_format($data->item_price, 2, '.', '');
                    }) 
                    ->addColumn('item_image', function($data){
                        if ($data->item_image != '') {
                            return '<a href="/images/items/'. $data->item_image . ' " target="_blank"><img src="/images/items/'. $data->item_image . ' "height="100px" style="margin-left: 10px;margin-right: auto;"></a>';
                        }
                        return '<img src="/images/default.png" height="100px" alt="default">';
                    })  
                    ->addColumn('action', function($data) {
                        $button = '<a href="/miscellaneous-and-other-fees/'. $data->id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-search"></span></a>';
                        return $button;
                    })
                    ->rawColumns(['item_price', 'item_image', 'action'])
                    ->make(true);
            }
        }

        return view('miscellaneous-and-other-fees.index', compact('miscellaneous_and_other_fees'));
    }

    public function create()
    {
        return view('miscellaneous-and-other-fees.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item_code'          =>  'required',
            'item_description'   =>  'required',
            'item_price'         =>  'required',
            'item_image'         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images/items');
            $image->move($destinationPath, $name);
        } else {
            $name = 'default.jfif';
        }
        
        $miscellaneous_and_other_fee = new MiscellaneousAndOtherFees();
        $miscellaneous_and_other_fee->class_id = session()->get('present_class_id');
        $miscellaneous_and_other_fee->item_code = $request['item_code'];
        $miscellaneous_and_other_fee->item_description = $request['item_description'];
        $miscellaneous_and_other_fee->item_price = doubleval($request['item_price']);
        $miscellaneous_and_other_fee->item_image = $name;
        $miscellaneous_and_other_fee->save();   

        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->where('class_id', session()->get('present_class_id'))
            ->where('students.student_active_status', 1)
            ->get();

        foreach ($students_classes as $student_class) {
            $payment = Payment::where('student_id', $student_class->student_id)->get();
            if(isset($payment[0]) != '') {
                $payment[0]->amount_payable = $payment[0]->amount_payable + $request['item_price'];
                $payment[0]->amount_due = $payment[0]->amount_due + $request['item_price'];
                $payment[0]->save();
            }
        }

        return redirect('/miscellaneous-and-other-fees/classes/' . session()->get('present_class_id'));
    }

    public function show($id)
    {
        $miscellaneous_and_other_fees = MiscellaneousAndOtherFees::where('id', $id)->get();
        return view('miscellaneous-and-other-fees.show', compact('miscellaneous_and_other_fees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $miscellaneous_and_other_fees = MiscellaneousAndOtherFees::where('id', $id)->get();
        return view('miscellaneous-and-other-fees.edit', compact('miscellaneous_and_other_fees'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item_code'          =>  'required',
            'item_description'   =>  'required',
            'item_price'         =>  'required',
            'item_image'         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $miscellaneous_and_other_fee = MiscellaneousAndOtherFees::find($id);
        
        $miscellaneous_and_other_fee->item_code = $request['item_code'];
        $miscellaneous_and_other_fee->item_description = $request['item_description'];
        $miscellaneous_and_other_fee->item_price = doubleval($request['item_price']);

        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images/items');
            $image->move($destinationPath, $name);
            $miscellaneous_and_other_fee->item_image = $name;
        } 

        $miscellaneous_and_other_fee->save();   

        $fees = MiscellaneousAndOtherFees::where('class_id', session()->get('present_class_id'))->get();
        $payable = 0;
        foreach($fees as $fee) {
            $payable += $fee->item_price;
        }

        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->where('class_id', session()->get('present_class_id'))
            ->get();

        foreach ($students_classes as $student_class) {
            $payment = Payment::where('student_id', $student_class->student_id)->get();
            $payment[0]->amount_payable = $payable;
            $payment[0]->amount_due = $payable - $payment[0]->amount_paid;
            $payment[0]->save();
        }
        
        return redirect('/miscellaneous-and-other-fees/classes/' . session()->get('present_class_id'));
    }

    public function destroy($id)
    {
        $data = MiscellaneousAndOtherFees::findOrFail($id);

        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->where('class_id', session()->get('present_class_id'))
            ->get();

        foreach ($students_classes as $student_class) {
            $payment = Payment::where('student_id', $student_class->student_id)->get();
            $payment[0]->amount_payable = $payment[0]->amount_payable - $data->item_price;
            $payment[0]->amount_due = $payment[0]->amount_payable - $payment[0]->amount_paid;
            $payment[0]->save();
        }

        $data->delete();
    }
}
