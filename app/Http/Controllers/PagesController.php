<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $students = [];
        $students['nursery'] = Student::where('grade_level_id', 2)->get();
        $students['nursery2'] = Student::where('grade_level_id', 3)->get();
        $students['kinder1'] = Student::where('grade_level_id', 4)->get();
        $students['kinder2'] = Student::where('grade_level_id', 5)->get();
        $students['grade1'] = Student::where('grade_level_id', 6)->get();
        $students['grade2'] = Student::where('grade_level_id', 7)->get();
        $students['grade3'] = Student::where('grade_level_id', 8)->get();
        $students['grade4'] = Student::where('grade_level_id', 9)->get();
        $students['grade5'] = Student::where('grade_level_id', 10)->get();
        $students['grade6'] = Student::where('grade_level_id', 11)->get();
        $students['musicTutees'] = Student::where('tutorial_id', 2)->get();
        $students['pianoTutees'] = Student::where('tutorial_id', 3)->get();
        // dd($students);
        return view('pages.index', compact('students'));
    }
    
    public function students() {
        return view('pages.students');
    }
    
    public function payments() {
        return view('pages.payments');
    }

}
