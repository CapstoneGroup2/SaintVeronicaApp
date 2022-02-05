<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYear;
use App\Models\Admission;
use App\Models\ClassSection;
use App\Models\Classes;
use App\Models\MiscellaneousAndOtherFees;
use Illuminate\Support\Facades\DB;

class SchoolYearController extends Controller
{
    public function index()
    {
        $school_years = SchoolYear::all();
        $students = Admission::all();

        $list_of_school_year_and_students = [];

        foreach($school_years as $school_year) {
            $students_per_school_year = [];
            $students_per_school_year['school_year_id'] = $school_year->id;
            $students_per_school_year['school_year'] = $school_year->school_year;

            $student_count = 0;
            foreach($students as $student) {
                if($student->school_year_id == $school_year->id) {
                    ++$student_count;
                }
            }

            $students_per_school_year['students_count'] = $student_count;
            array_push($list_of_school_year_and_students, $students_per_school_year);
        }

        return view('school-year.index', compact('list_of_school_year_and_students'));
    }

    public function showStudentsByClass($id) {

        // $admission_students = DB::table('admissions')
        //     ->join('students', 'students.id', 'admissions.student_id')
        //     ->join('class_sections', 'class_sections.id', 'admissions.class_section_id')
        //     ->join('school_years', 'school_years.id', 'admissions.school_year_id')
        //     ->where('admissions.school_year_id', $id)
        //     ->get();
        
        // $school_year = SchoolYear::where('id' , $id)->get();

        // session()->put('selected_school_year_id_in_students_page', $id);
        // session()->put('selected_school_year_in_students_page', $school_year[0]->school_year);
        // return view('students.index', compact($admission_students));

        $list_of_students_per_class = [];
        
        $classes = Classes::all();

        foreach($classes as $class) {
            $student_per_class = [];
            $class_sections = ClassSection::where('class_id', $class->id)->get();
            $sections = [];
            foreach($class_sections as $class_section) {
                $students_in_class_section = Admission::where('class_section_id', $class_section->id)->where('school_year_id', $id)->count();
                array_push($sections, [$class_section->section, $students_in_class_section]);
            }
            $student_per_class['class_sections'] = $sections;
            $student_per_class['class_id'] = $class->id;
            $student_per_class['class_name'] = $class->class;
            $student_per_class['school_year_id'] = $id;
            array_push($list_of_students_per_class, $student_per_class);
        }

        $school_year = SchoolYear::where('id', $id)->get();

        session()->put('selected_school_year_in_students_page', $school_year[0]->school_year);
        session()->put('selected_school_year_id_in_students_page', $id);

        return view('students.index', compact('list_of_students_per_class'));
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
