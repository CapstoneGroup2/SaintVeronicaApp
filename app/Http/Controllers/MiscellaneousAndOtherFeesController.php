<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MiscellaneousAndOtherFees;
use Illuminate\Support\Facades\DB;
use Auth;

class MiscellaneousAndOtherFeesController extends Controller
{
    public function showGradeLevelMiscellaneousAndOtherFeesAfterEnroll($id) {
        $gradeLevel = DB::select('select `grade_level_name` from grade_levels where id = ' . $id);
        session()->put('category', 'grade-levels');
        session()->put('category_id', $id);
        session()->put('gradeLevelName', $gradeLevel[0]->grade_level_name);
        $miscellaneous_and_other_fees = DB::select('select * from miscellaneous_and_other_fees where grade_level_id = ' . $id);
    
        return view('miscellaneous-and-other-fees.show_after_enroll', compact('miscellaneous_and_other_fees'));
    }

    public function showTutorialMiscellaneousAndOtherFeesAfterEnroll($id) {
        $tutorial = DB::select('select `tutorial_name` from tutorials where id = ' . $id);
        session()->put('category', 'tutorials');
        session()->put('category_id', $id);
        session()->put('tutorialName', $tutorial[0]->tutorial_name);
        $miscellaneous_and_other_fees = DB::select('select * from miscellaneous_and_other_fees where tutorial_id = ' . $id);
    
        return view('miscellaneous-and-other-fees.show_after_enroll', compact('miscellaneous_and_other_fees'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGradeLevelMiscellaneousAndOtherFees($id)
    {
        $gradeLevel = DB::select('select `grade_level_name` from grade_levels where id = ' . $id);
        session()->put('category', 'grade-levels');
        session()->put('category_id', $id);
        session()->put('gradeLevelName', $gradeLevel[0]->grade_level_name);
        $miscellaneous_and_other_fees = DB::select('select * from miscellaneous_and_other_fees where grade_level_id = ' . $id);
        if (request()->ajax())
        {
            return datatables()->of($miscellaneous_and_other_fees)
                ->addColumn('image', function($data){
                    return '<img src="/images/logo.jpg" width="80px">';
                })  
                ->addColumn('action', function($data) {
                    $button = '<a href="/miscellaneous_and_other_fees/'. $data->id . '" class="btn btn-md btn-primary" role="button" style="margin: 0 3%">View</a>';
                    $button .= '<a href="/miscellaneous_and_other_fees/'. $data->id .'/edit" class="btn btn-md btn-warning" role="button" style="margin: 0 3%">Edit</a>';
                    $button .= '<button id="'. $data->id .'" class="btn btn-md btn-danger btn-remove" style="margin: 0 3%">Remove</button>';
                    return $button;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('miscellaneous-and-other-fees.index', compact('miscellaneous_and_other_fees'));
    }
    
    public function showTutorialMiscellaneousAndOtherFees($id) {
        
        $tutorial = DB::select('select `tutorial_name` from tutorials where id = ' . $id);
        session()->put('category', 'tutorials');
        session()->put('category_id', $id);
        session()->put('tutorialName', $tutorial[0]->tutorial_name);
        $miscellaneous_and_other_fees = DB::select('select * from miscellaneous_and_other_fees where tutorial_id = ' . $id);
        if (request()->ajax())
        {
            return datatables()->of($miscellaneous_and_other_fees)
                ->addColumn('action', function($data) {
                    $button = '<a href="/miscellaneous_and_other_fees/'. $data->id . '" class="btn btn-md btn-primary" role="button" style="margin: 0 3%">View</a>';
                    $button .= '<a href="/miscellaneous_and_other_fees/'. $data->id .'/edit" class="btn btn-md btn-warning" role="button" style="margin: 0 3%">Edit</a>';
                    $button .= '<button id="'. $data->id .'" class="btn btn-md btn-danger btn-remove" style="margin: 0 3%">Remove</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('miscellaneous-and-other-fees.index', compact('miscellaneous_and_other_fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('miscellaneous-and-other-fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'grade_level_id'                            =>  'required',
            'tutorial_id'                               =>  'required',
            'miscellaneous_and_other_fee_name'          =>  'required',
            'miscellaneous_and_other_fee_description'   =>  'required',
            'miscellaneous_and_other_fee_price'         =>  'required',
            'miscellaneous_and_other_fee_image'         =>  'required',
        ]);
        
        $miscellaneous_and_other_fee = new MiscellaneousAndOtherFees();
        
        $miscellaneous_and_other_fee->grade_level_id = $request['grade_level_id'];
        $miscellaneous_and_other_fee->tutorial_id = $request['tutorial_id'];
        $miscellaneous_and_other_fee->miscellaneous_and_other_fee_name = $request['miscellaneous_and_other_fee_name'];
        $miscellaneous_and_other_fee->miscellaneous_and_other_fee_description = $request['miscellaneous_and_other_fee_description'];
        $miscellaneous_and_other_fee->miscellaneous_and_other_fee_price = floatval($request['miscellaneous_and_other_fee_price']);
        $miscellaneous_and_other_fee->miscellaneous_and_other_fee_image = $request['miscellaneous_and_other_fee_image'];

        $miscellaneous_and_other_fee->save();   

        return redirect('/miscellaneous-and-other-fees/' . session()->get('category') . '/' . session()->get('category_id'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('miscellaneous-and-other-fees.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('miscellaneous-and-other-fees.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
