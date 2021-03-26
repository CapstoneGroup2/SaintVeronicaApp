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
        $students_classes = StudentsClasses::all();
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
        return view('pages.dashboard', compact('students_classes', 'classes'));
    }

    public function home() {
        $students_classes = StudentsClasses::all();
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

    public function reports() {
        return view('pages.reports');
    }
}
