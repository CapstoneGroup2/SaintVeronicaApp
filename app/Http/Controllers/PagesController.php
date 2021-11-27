<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentsClasses;
use App\Models\MiscellaneousAndOtherFees;
use App\Models\Payment;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function landingPage()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();
        return view('landing-page', compact('announcements'));   
    }

    public function dashboard() 
    {
        // $students_classes = DB::table('students_classes')
        //     ->join('students', 'students.id', '=', 'students_classes.student_id')
        //     ->join('classes', 'classes.id', '=', 'students_classes.class_id')
        //     ->get();

        // $classes = Classes::all();
        // $students = Student::all();

        // $students_count = [];
        // $put_sessions = [];
        // $total_count = [];
        // $total_count['total_students'] = 0;
        // $total_count['total_female_students'] = 0;
        // $total_count['total_male_students'] = 0;

        // foreach($classes as $class) {
        //     $student_count = [];
        //     $student_count['class_id'] = $class->id;
        //     $student_count['class_name'] = $class->class_name;
        //     $student_count['class_count'] = 0;
        //     $student_count['class_female'] = 0;
        //     $student_count['class_male'] = 0;

        //     foreach ($students_classes as $student_class) {
        //         if ($student_class->class_id == $class->id) {
        //             ++$student_count['class_count'];
        //             ++$total_count['total_students'];
        //             if ($student_class->student_gender == 'Female') {
        //                 ++$student_count['class_female'];
        //                 ++$total_count['total_female_students'];
        //             } else{
        //                 ++$student_count['class_male'];
        //                 ++$total_count['total_male_students'];
        //             } 
        //         }
        //     }

        //     array_push($students_count, $student_count);
        //     array_push($put_sessions, [$class->class_name, $class->id]);
        // }

        // session()->put('classes', $put_sessions);

        // $data_gender = DB::table('students')
        //                     ->select(
        //                         DB::raw('student_gender as gender'),
        //                         DB::raw('count(*) as number'))
        //                     ->groupBy('student_gender')
        //                     ->get();

        // $array_gender[] = ['Gender', 'Number'];

        // foreach($data_gender as $key => $value) 
        // {
        //     $array_gender[++$key] = [$value->gender, $value->number];
        // }

        // $data_students_classes = DB::table('students_classes')
        //                             ->join('classes', 'classes.id', '=', 'students_classes.class_id')
        //                             ->select(
        //                                 DB::raw('classes.class_name as classes'),
        //                                 DB::raw('count(*) as number'))
        //                             ->groupBy('classes.class_name')
        //                             ->get();

        // $array_students_classes[] = ['Classes', 'Number'];

        // foreach($data_students_classes as $key => $value) 
        // {
        //     $array_students_classes[++$key] = [$value->classes, $value->number];
        // }

        // return view('pages.dashboard', compact('students_count', 'total_count'))
        //         ->with('gender', json_encode($array_gender))
        //         ->with('classes', json_encode($array_students_classes));
        return view('pages.dashboard');
    }

    public function home() 
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

        return view('pages.home', compact('students_count'));
    }

    public function reports() 
    {
        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->get();

        $classes = Classes::all();
        $students = Student::all();

        $students_count = [];
        $put_sessions = [];
        $total_count = [];
        $total_count['total_students'] = 0;
        $total_count['total_female_students'] = 0;
        $total_count['total_male_students'] = 0;

        foreach($classes as $class) {
            $student_count = [];
            $student_count['class_id'] = $class->id;
            $student_count['class_name'] = $class->class_name;
            $student_count['class_count'] = 0;
            $student_count['class_female'] = 0;
            $student_count['class_male'] = 0;

            foreach ($students_classes as $student_class) {
                if ($student_class->class_id == $class->id) {
                    ++$student_count['class_count'];
                    ++$total_count['total_students'];
                    if ($student_class->student_gender == 'Female') {
                        ++$student_count['class_female'];
                        ++$total_count['total_female_students'];
                    } else{
                        ++$student_count['class_male'];
                        ++$total_count['total_male_students'];
                    } 
                }
            }

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

        return view('pages.reports', compact('students_count', 'total_count'))
                ->with('gender', json_encode($array_gender))
                ->with('classes', json_encode($array_students_classes));
    }
}
