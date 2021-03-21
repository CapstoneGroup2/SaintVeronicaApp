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
    public function showGradeLevelStudents($id)
    {
        $gradeLevel = DB::select('select `grade_level_name` from grade_levels where id = ' . $id);
        session()->put('category', 'grade-levels');
        session()->put('category_id', $id);
        session()->put('gradeLevelName', $gradeLevel[0]->grade_level_name);
        $students = DB::select('select * from students where grade_level_id = ' . $id);
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
    
    public function showTutorialStudents($id) {
        
        $tutorial = DB::select('select `tutorial_name` from tutorials where id = ' . $id);
        session()->put('category', 'tutorials');
        session()->put('category_id', $id);
        session()->put('tutorialName', $tutorial[0]->tutorial_name);
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
                $button .= '<a href="/students/'. $data->id .'/
                " class="btn btn-md btn-warning" role="button" style="margin: 0 3%">Edit</a>';
                $button .= '<button id="'. $data->id .'" class="btn btn-md btn-danger btn-remove" style="margin: 0 3%">Remove</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('students.index', compact('students'));
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
            'grade_level_id'        =>  'required',
            'tutorial_id'           =>  'required',
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
        
        $student->grade_level_id = $request['grade_level_id'];
        $student->tutorial_id = $request['tutorial_id'];
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
        
        return redirect('/miscellaneous-and-other-fees/' . rtrim(session()->get('category'), "s") . '/' . session()->get('category_id'));
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

        if(session()->get('category') == 'grade-levels') {
            $miscellaneous_and_other_fees = DB::select('select * from miscellaneous_and_other_fees where grade_level_id = ' . session()->get('category_id'));
        } else if(session()->get('category') == 'tutorials') {
            $miscellaneous_and_other_fees = DB::select('select * from miscellaneous_and_other_fees where tutorial_id = ' . session()->get('category_id'));
        }

        return view('students.show', ['students' => $students, 'miscellaneous_and_other_fees' => $miscellaneous_and_other_fees]);
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
            'grade_level_id'        =>  'required',
            'tutorial_id'           =>  'required',
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
        
        $student->grade_level_id = $request['grade_level_id'];
        $student->tutorial_id = $request['tutorial_id'];
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
