<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentsClasses;
use App\Models\MiscellaneousAndOtherFees;
use App\Models\Payment;
use App\Models\Classes;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function dashboard() {
        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->where('students.student_active_status', 1)
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
                if ($student_class->class_id == $class->id && $student_class->student_active_status == 1) {
                    ++$count;
                }
            }

            $student_count['class_count'] = $count;
            array_push($students_count, $student_count);
            array_push($put_sessions, [$class->class_name, $class->id]);
        }

        session()->put('classes', $put_sessions);

        $data_gender = DB::table('students')
                            ->select(
                                DB::raw('student_gender as gender'),
                                DB::raw('count(*) as number'))
                            ->groupBy('student_gender')
                            ->get();

        $array_gender[] = ['Gender', 'Number'];

        foreach($data_gender as $key => $value) 
        {
            $array_gender[++$key] = [$value->gender, $value->number];
        }

        $data_gender = DB::table('students')
                            ->select(
                                DB::raw('student_gender as gender'),
                                DB::raw('count(*) as number'))
                            ->groupBy('student_gender')
                            ->get();

        $array_gender[] = ['Gender', 'Number'];

        foreach($data_gender as $key => $value) 
        {
            $array_gender[++$key] = [$value->gender, $value->number];
        }

        $data_students_classes = DB::table('students_classes')
                                    ->join('classes', 'classes.id', '=', 'students_classes.class_id')
                                    ->select(
                                        DB::raw('classes.class_name as classes'),
                                        DB::raw('count(*) as number'))
                                    ->groupBy('classes.class_name')
                                    ->get();

        $array_students_classes[] = ['Classes', 'Number'];

        foreach($data_students_classes as $key => $value) 
        {
            $array_students_classes[++$key] = [$value->classes, $value->number];
        }

        $data_enrollees_per_month = DB::table('students')
                                        ->select(
                                            DB::raw("COUNT(*) as count"),
                                            DB::raw("MONTHNAME(created_at) as month_name"),
                                            DB::raw('max(created_at) as createdAt'))
                                        ->whereYear('created_at', date('Y'))
                                        ->groupBy('month_name')
                                        ->orderBy('createdAt')
                                        ->get(); 

        dd($data_enrollees_per_month);

        // $array_enrollees_per_month[] = ['Month', 'Number'];

        // foreach($data_enrollees_per_month as $key => $value) 
        // {
        //     $array_enrollees_per_month[++$key] = [$value->month_name, $value->number];
        // }

        return view('pages.home', compact('students_count'));
        //         ->with('gender', json_encode($array_gender))
        //         ->with('classes', json_encode($array_students_classes))
        //         ->with('enrollees', json_encode($array_enrollees_per_month));
    }

    public function home() {
        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->where('students.student_active_status', 1)
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
                if ($student_class->class_id == $class->id && $student_class->student_active_status == 1) {
                    ++$count;
                }
            }

            $student_count['class_count'] = $count;
            array_push($students_count, $student_count);
            array_push($put_sessions, [$class->class_name, $class->id]);
        }

        session()->put('classes', $put_sessions);

        return view('pages.home', compact('students_count'));
    }

    public function reports() {
        return view('pages.reports');
    }
}
