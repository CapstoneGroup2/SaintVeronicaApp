<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class TutorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session()->put('category', 'tutorial');
        session()->put('category_id', $id);
        $students = DB::select('select * from students where tutorial_id = ' . $id);
        if (request()->ajax())
        {
            return datatables()->of($students)
            ->addColumn('full_name', function($data) {
                $full_name = $data->student_first_name . ' ' . $data->student_middle_name . ' ' . $data->student_last_name;
                return $full_name;
            })
            ->addColumn('action', function($data) {
                $button = '<a href="/students/'. $data->id . '" class="btn btn-md btn-primary" role="button" style="margin: 0 3%">View</a>';
                $button .= '<a href="/students/'. $data->id .'/edit" class="btn btn-md btn-warning" role="button" style="margin: 0 3%">Edit</a>';
                $button .= '<button id="'. $data->id .'" class="btn btn-md btn-danger btn-remove" style="margin: 0 3%">Remove</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
