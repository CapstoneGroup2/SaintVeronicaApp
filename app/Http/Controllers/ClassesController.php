<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Admission;
use App\Models\MiscellaneousAndOtherFees;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function index()
    {
        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->get();

        $classes = Classes::all();
        $students = Student::all();

        $students_count = [];
        $put_sessions = [];

        foreach($classes as $class) {
            $student_count = [];
            $student_count['class_id'] = $class->id;
            $student_count['class_name'] = $class->class_name;

            $count = 0;
            foreach ($students_classes as $student_class) {
                if ($student_class->class_id == $class->id) {
                    ++$count;
                }
            }

            $student_count['class_count'] = $count;
            array_push($students_count, $student_count);
            array_push($put_sessions, [$class->class_name, $class->id]);
        }

        session()->put('classes', $put_sessions);

        return view('classes.index', compact('students_count'));
    }

    public function showStudents($id) {
        $list_of_students = [];

        $classes = Classes::where('class_id', $id)->get();

        foreach($classes as $class) {
            $students = DB::table('admissions')
                ->join('students', 'students.id', 'admissions.student_id')
                ->join('class_sections', 'class_sections.id', 'admissions.class_section_id')
                ->join('school_years', 'school_years.id', 'admissions.school_year_id')
                ->where('admissions.class_section_id', $class->id)
                ->where('admissions.school_year_id', session()->get('selected_school_year_in_students_page'))
                ->get();
            array_push($list_of_students, $students);
        }

        if (request()->ajax())
        {
            return datatables()->of($list_of_students)
                ->addColumn('student_id', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->student_id . '</span>';
                })
                ->addColumn('full_name', function($data) {
                    $full_name = $data->middle_name != "" ? $data->first_name . ' ' . $data->middle_name . ' '. $data->last_name : $data->first_name . ' ' . $data->last_name;
                    return $full_name;
                })
                ->addColumn('email', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->email . '</span>';
                })
                ->addColumn('address', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->address . '</span>';
                })
                ->addColumn('contact', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->contact . '</span>';
                })
                ->addColumn('action', function($data) {
                    $button = '<a href="/students/'. $data->student_id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-eye-open"></span></a>';
                    $button .= '<a href="/students/'. $data->student_id .'/edit
                    " data-toggle="tooltip" title="Edit" class="btn btn-md btn-warning" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-pencil"></span></a>';
                    $button .= '<button type="button" id="'. $data->student_id .'" data-toggle="tooltip" title="Remove" class="btn btn-md btn-danger btn-remove" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-trash"></span></button>';
                    $button .= '<button id="'. $data->student_id .'" class="btn btn-lg btn-success btn-admission">For Admission</button>';
                    return $button;
                })
                ->rawColumns(['student_id', 'full_name', 'email', 'address', 'contact', 'action'])
                ->make(true);
        }

        return view('students.index', compact(list_of_students));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'class_name'          =>  'required|unique:classes',
            'class_description'   =>  'nullable'
        ]);

        $class = new Classes();
        $class->class_name = ucwords(strtolower($request['class_name']));
        $class->class_description = $request['class_description'];
        $class->save();

        $class = Classes::where('class_name', $request['class_name'])->get();
        $classes = session()->get('classes');
        array_push($classes, [$request['class_name'], $class[0]->id]);

        session()->put('classes', $classes);
        
        return redirect('/miscellaneous-and-other-fees/classes/' . $class[0]->id)->with('success', 'Class has successfully created!');
    }

    public function edit($id)    
    {
        $class = Classes::find($id);
        return view('classes.edit', compact('class'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'class_name'          =>  'required|unique:classes,class_name,'.$id,
            'class_description'   =>  'nullable'
        ]);

        $class = Classes::find($id);
        $class->class_name = ucwords(strtolower($request['class_name']));
        $class->class_description = $request['class_description'];
        $class->save();

        return redirect('/classes')->with('success', 'Class information has successfully updated!');
    }

    public function destroy($id)
    {
        $items = MiscellaneousAndOtherFees::where('class_id', $id)->get();
        try {
            if(isset($items[0])) {
                PaymentsHistory::where('student_id', $id)->delete(); 
            }

            $class = Classes::find($id)->delete();

            $students_classes = DB::table('students_classes')
                ->join('students', 'students.id', '=', 'students_classes.student_id')
                ->join('classes', 'classes.id', '=', 'students_classes.class_id')
                ->get();

            $classes = Classes::all();
            $students = Student::all();

            $students_count = [];
            $put_sessions = [];

            foreach($classes as $class) {
                $student_count = [];
                $student_count['class_id'] = $class->id;
                $student_count['class_name'] = $class->class_name;

                $count = 0;
                foreach ($students_classes as $student_class) {
                    if ($student_class->class_id == $class->id) {
                        ++$count;
                    }
                }

                $student_count['class_count'] = $count;
                array_push($students_count, $student_count);
                array_push($put_sessions, [$class->class_name, $class->id]);
            }

            session()->put('classes', $put_sessions);
        } catch (\Exception $exception) {

        }
    }

}
