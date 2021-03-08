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
        $students = DB::select('select * from students where student_active_status = 1');
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
            'student_first_name'    =>  'required',
            'student_middle_name'   =>  'required',
            'student_last_name'     =>  'required',
            'student_email'         =>  'required',
            'student_home_contact'  =>  'required',
            'student_address'       =>  'required',
            'student_birth_date'    =>  'required',
            'student_age'           =>  'required',
            'student_gender'        =>  'required',
            'student_status'        =>  'required',
        ]);
        
        $student = new Student();
        $student->student_first_name = $request['student_first_name'];
        $student->student_middle_name = $request['student_middle_name'];
        $student->student_last_name = $request['student_last_name'];
        $student->student_email = $request['student_email'];
        $student->student_home_contact = $request['student_home_contact'];
        $student->student_address = $request['student_address'];
        $student->student_gender = $request['student_gender'];
        $student->student_age = $request['student_age'];
        $student->student_birth_date = date('Y-m-d', strtotime($request['student_birth_date']));
        $student->student_status = $request['student_status'];
        $student->student_active_status = 1;
        $student->created_at = date('Y-m-d');

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
        $students = DB::select('select * from students where id = ' . $id);
        return view('students.show', ['students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = DB::select('select * from students where id = ' . $id);
        return view('students.edit', ['students' => $students]);
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
        $this->validate($request, [
            'student_first_name'    =>  'required',
            'student_middle_name'   =>  'required',
            'student_last_name'     =>  'required',
            'student_email'         =>  'required',
            'student_home_contact'  =>  'required',
            'student_address'       =>  'required',
            'student_birth_date'    =>  'required',
            'student_age'           =>  'required',
            'student_gender'        =>  'required',
            'student_status'        =>  'required',
        ]);
        
        $student = Student::find($id);
        $student->student_first_name = $request['student_first_name'];
        $student->student_middle_name = $request['student_middle_name'];
        $student->student_last_name = $request['student_last_name'];
        $student->student_email = $request['student_email'];
        $student->student_home_contact = $request['student_home_contact'];
        $student->student_address = $request['student_address'];
        $student->student_gender = $request['student_gender'];
        $student->student_age = $request['student_age'];
        $student->student_birth_date = date('Y-m-d', strtotime($request['student_birth_date']));
        $student->student_status = $request['student_status'];
        $student->student_active_status = 1;
        $student->updated_at = date('Y-m-d');

        $student->save();

        return redirect('/students')->with('status', 'Student information successfully updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from students where id = ' . $id);

        return redirect('/students'); 
    }
}
