<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->get();
        error_log(print_r($students, true));
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'first_name'    =>  'required',
            'middle_name'   =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required',
            'contact'       =>  'required',
            'address'       =>  'required',
            'birthdate'     =>  'required',
            'age'           =>  'required',
            'gender'        =>  'required',
            'status'        =>  'required',
        ]);
        
        $student = new Student();
        $student->student_first_name = $request['first_name'];
        $student->student_middle_name = $request['middle_name'];
        $student->student_last_name = $request['last_name'];
        $student->student_email = $request['email'];
        $student->student_home_contact = $request['contact'];
        $student->student_address = $request['address'];
        $student->student_gender = $request['gender'];
        $student->student_age = $request['age'];
        $student->student_birth_date = date('Y-m-d', strtotime($request['birthdate']));
        $student->student_status = $request['status'];
        $student->student_active_status = 1;

        $student->save();   

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
