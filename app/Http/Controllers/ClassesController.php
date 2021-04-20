<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student;
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'class_name'          =>  'required|unique:classes',
        ]);

        $class = new Classes();
        $class->class_name = $request['class_name'];
        $class->class_description = $request['class_description'];
        $class->save();

        $class = Classes::where('class_name', $request['class_name'])->get();
        $classes = session()->get('classes');
        array_push($classes, [$request['class_name'], $class[0]->id]);

        session()->put('classes', $classes);
        
        return redirect('/miscellaneous-and-other-fees/classes/' . $class[0]->id)->with('success', 'Class has successfully created!');
    }

}
