<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentsClasses;
use App\Models\Classes;
use App\Models\Payment;
use App\Models\PaymentsHistory;
use App\Models\MiscellaneousAndOtherFees;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsByClassExport;
use App\Exports\StudentsExport;

class StudentsController extends Controller
{
    public function index() {
    }

    public function showMiscellaneousAndOtherFeesAfterEnroll($id) {
        $miscellaneous_and_other_fees = MiscellaneousAndOtherFees::where('class_id', session()->get('present_class_id'))->get();
        $payments = Payment::where('student_id', session()->get('student_id'))->get();
        return view('students.show_after_enroll', compact('miscellaneous_and_other_fees', 'payments'));
    }
    
    public function showStudentsByClass($id) {

        $students_classes = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->where('students_classes.class_id', $id)
            ->get();

        $classes = Classes::where('id' , $id)->get();
        session()->put('present_class_id', $id);
        session()->put('present_class_name', $classes[0]->class_name);

        if (request()->ajax())
        {
            return datatables()->of($students_classes)
                ->addColumn('student_id', function($data) {
                    return '<span style="font-weight: bold; font-size: 17px;">' . $data->student_id . '</span>';
                })
                ->addColumn('full_name', function($data) {
                    $full_name = $data->student_middle_name != "" ? $data->student_first_name . ' ' . $data->student_middle_name . ' '. $data->student_last_name : $data->student_first_name . ' ' . $data->student_last_name;
                    return $full_name;
                })
                ->addColumn('action', function($data) {
                    $button = '<a href="/students/'. $data->student_id . '" data-toggle="tooltip" title="View" class="btn btn-md btn-primary" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-eye-open"></span></a>';
                    $button .= '<a href="/students/'. $data->student_id .'/edit
                    " data-toggle="tooltip" title="Edit" class="btn btn-md btn-warning" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-pencil"></span></a>';
                    $button .= '<button type="button" id="'. $data->student_id .'" data-toggle="tooltip" title="Remove" class="btn btn-md btn-danger btn-remove" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-trash"></span></button>';
                    $button .= '<button id="'. $data->student_id .'" class="btn btn-lg btn-success btn-admission">For Admission</button>';
                    return $button;
                })
                ->rawColumns(['student_id', 'full_name', 'action'])
                ->make(true);
        }
        
        $classes = Classes::all();
        $payments = Payment::all();

        return view('students.index', compact('students_classes', 'classes', 'payments'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_first_name'              =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_middle_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_last_name'               =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_email'                   =>  'required|email|unique:students',
            'student_home_contact'            =>  'required|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_address'                 =>  'required',
            'student_birth_date'              =>  'required|before:now',
            'student_age'                     =>  'required|numeric|min:2|max:100',
            'student_gender'                  =>  'required',
            'student_mother_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_mother_contact_number'   =>  'nullable|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_father_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_father_contact_number'   =>  'nullable|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_guardian_name'           =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_guardian_contact_number' =>  'required|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_image'                   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $student = new Student();
            $student->id = Student::latest('id')->first()->id + 1;
            $student->student_first_name = $request['student_first_name'];
            $student->student_middle_name = $request['student_middle_name'];
            $student->student_last_name = $request['student_last_name'];
            $student->student_email = $request['student_email'];
            $student->student_home_contact = $request['student_home_contact'];
            $student->student_address = $request['student_address'];
            $student->student_gender = $request['student_gender'];
            $student->student_age = $request['student_age'];
            $student->student_birth_date = date('Y-m-d', strtotime($request['student_birth_date']));
            $student->student_mother_name = $request['student_mother_name'];
            $student->student_mother_contact_number = $request['student_mother_contact_number'];
            $student->student_father_name = $request['student_father_name'];
            $student->student_father_contact_number = $request['student_father_contact_number'];
            $student->student_guardian_name = $request['student_guardian_name'];
            $student->student_guardian_contact_number = $request['student_guardian_contact_number'];

            if ($request->hasFile('student_image')) {
                $image = $request->file('student_image');
                $name = $image->getClientOriginalName();
                $destinationPath = public_path('/images/students');
                $image->move($destinationPath, $name);
            } else {
                $name = 'default.png';
            }

            $student->student_image = $name;
            $student->save();   

            $student_class = new StudentsClasses();
            $student_class->student_id = $student->id;
            $student_class->class_id = session()->get('present_class_id');
            $student_class->save();

            $fees = MiscellaneousAndOtherFees::where('class_id', session()->get('present_class_id'))->get();
            $payable = 0;
            foreach($fees as $fee) {
                $payable += $fee->item_price;
            }
            
            $payment = new Payment();
            $payment->student_id = $student->id;
            $payment->total_payables = $payable;
            $payment->amount_paid = 0;
            $payment->balance_due = $payable;
            $payment->save();

            session()->put('student_id', $student->id);

            return redirect('/students/payments/' . session()->get('present_class_id') . '/edit');
        } catch (\Exception $exception) {
            return redirect('/students/classes/' . session()->get('present_class_id'))->with('error_message', 'There is error in enrolling student!');
        }
    }

    public function show($id)
    {        
        $student = Student::find($id);
        $miscellaneous_and_other_fees = MiscellaneousAndOtherFees::where('class_id', session()->get('present_class_id'))->get();
        $payments = Payment::where('student_id', $id)->get();
        
        $histories = DB::table('payments_histories')
            ->join('students', 'students.id', '=', 'payments_histories.student_id')
            ->join('users', 'users.id', '=', 'payments_histories.user_id')
            ->where('students.id', $id)
            ->orderBy('payments_histories.id', 'desc')
            ->get();
        
        return view('students.show', compact('student', 'miscellaneous_and_other_fees', 'payments', 'histories'));
    }

    public function edit($id)
    {
        $students = DB::select('select * from students where id = ' . $id);
        return view('students.edit', ['students' => $students]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_first_name'              =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_middle_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_last_name'               =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_email'                   =>  'required|email|unique:students,student_email,'.$id,
            'student_home_contact'            =>  'required|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_address'                 =>  'required',
            'student_birth_date'              =>  'required|before:now',
            'student_age'                     =>  'required|numeric|min:2|max:100',
            'student_gender'                  =>  'required',
            'student_mother_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_mother_contact_number'   =>  'nullable|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_father_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_father_contact_number'   =>  'nullable|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_guardian_name'           =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
            'student_guardian_contact_number' =>  'required|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
            'student_image'                   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            
        try {
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
            $student->student_mother_name = $request['student_mother_name'];
            $student->student_mother_contact_number = $request['student_mother_contact_number'];
            $student->student_father_name = $request['student_father_name'];
            $student->student_father_contact_number = $request['student_father_contact_number'];
            $student->student_guardian_name = $request['student_guardian_name'];
            $student->student_guardian_contact_number = $request['student_guardian_contact_number'];

            if ($request->hasFile('student_image')) {
                $image = $request->file('student_image');
                $name = $image->getClientOriginalName();
                $destinationPath = public_path('/images/students');
                $image->move($destinationPath, $name);
            } else {
                $name = 'default.png';
            }

            $student->student_image = $name;
            $student->save();

            return redirect('/students/classes/' . session()->get('present_class_id'))->with('success', 'Student information has successfully updated!');
        } catch (\Exception $exception) {
            return redirect('/students/classes/' . session()->get('present_class_id'))->with('error_message', 'There is error in updating student information!');
        }
    }

    public function destroy($id)
    { 
        try {
            PaymentsHistory::where('student_id', $id)->delete();
            Payment::where('student_id', $id)->delete();
            StudentsClasses::where('student_id', $id)->delete();
            $student = Student::find($id);
            $student->delete();
            $student->save();
        } catch (\Exception $exception) {
            return redirect('/students/classes/' . session()->get('present_class_id'))->with('error_message', 'There is error in deleting student!');
        }
    }

    public function admission(Request $request, $id)
    {
        $this->validate($request, [
            'class_id'    =>    'required',
        ]);

        try {
            $student_payment = Payment::where('student_id', $id)->get();
            $student_payment_history = PaymentsHistory::where('student_id', $id)->delete(); 

            $student_class = StudentsClasses::where('student_id', $id)->get();
            $student_class[0]->class_id = $request->class_id;
            $student_class[0]->save();
            
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

            $fees = MiscellaneousAndOtherFees::where('class_id', $request->class_id)->get();
            $payable = 0;
            foreach($fees as $fee) {
                $payable += $fee->item_price;
            }
            
            $student_payment[0]->total_payables = $payable;
            $student_payment[0]->amount_paid = 0;
            $student_payment[0]->balance_due = $payable;
            $student_payment[0]->save();

            session()->put('student_id', $id);
            session()->put('present_class_id', $request->class_id);
            
            return redirect('/students/payments/' . $request->class_id . '/edit');
        } catch (\Exception $exception) {
            return redirect('/students/classes/' . session()->get('present_class_id'))->with('error_message', 'There is error in admitting student!');
        }
    }
    
    public function import(Request $request)
    {
        $this->validate($request, [
            'upload_students'  => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file("upload_students");
        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);
        try {
            foreach ($rows as $row) {
                if (isset($row[0])) {
                    if ($row[0] != "") {
                        $row = array_combine($header, $row);

                        Validator::make($row, [
                            'first_name'              =>  ['required', 'regex:/^[A-Za-z_-\s_ \s]+$/'],
                            'middle_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
                            'last_name'               =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
                            'email_address'           =>  'required|email|unique:students',
                            'contact_number'          =>  'required|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
                            'home_address'            =>  'required',
                            'birth_date'              =>  'required|before:now',
                            'age'                     =>  'required|numeric|min:2|max:100',
                            'gender'                  =>  'required',
                            'mother_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
                            'mother_contact_number'   =>  'nullable|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
                            'father_name'             =>  'nullable|regex:/^[A-Za-z_-\s_ \s]+$/',
                            'father_contact_number'   =>  'nullable|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
                            'guardian_name'           =>  'required|regex:/^[A-Za-z_-\s_ \s]+$/',
                            'guardian_contact_number' =>  'required|regex:/^[-0-9\+_-\s]+$/|min:11|max:13',
                        ]);

                        if (!in_array($row['gender'], ['Female', 'Male'])) {
                            return redirect('/students/classes/import')->with('error_message', 'Error occured upon importing data. Please check csv file!');
                        }

                        $student = new Student();
                        $student->id = Student::latest('id')->first()->id + 1;
                        $student->student_first_name = $row['first_name'];
                        $student->student_middle_name = $row['middle_name'];
                        $student->student_last_name = $row['last_name'];
                        $student->student_email = $row['email_address'];
                        $student->student_home_contact = $row['contact_number'];
                        $student->student_address = $row['home_address'];
                        $student->student_gender = $row['gender'];
                        $student->student_age = $row['age'];
                        $student->student_birth_date = date('Y-m-d', strtotime($row['birth_date']));
                        $student->student_mother_name = $row['mother_name'];
                        $student->student_mother_contact_number = $row['mother_contact_number'];
                        $student->student_father_name = $row['father_name'];
                        $student->student_father_contact_number = $row['father_contact_number'];
                        $student->student_guardian_name = $row['guardian_name'];
                        $student->student_guardian_contact_number = $row['guardian_contact_number'];            
                        $student->student_image = 'default.png';
                        $student->save();   

                        $student_class = new StudentsClasses();
                        $student_class->student_id = $student->id;
                        $student_class->class_id = session()->get('present_class_id');
                        $student_class->save();
                
                        $fees = MiscellaneousAndOtherFees::where('class_id', session()->get('present_class_id'))->get();
                        $payable = 0;
                        foreach($fees as $fee) {
                            $payable += $fee->item_price;
                        }
                        
                        $payment = new Payment();
                        $payment->student_id = $student->id;
                        $payment->total_payables = $payable;
                        $payment->amount_paid = 0;
                        $payment->balance_due = $payable;
                        $payment->save();
                    }
                }
            }
            return redirect('/students/classes/' . session()->get('present_class_id'))->with('success', 'Students added successfully!');
        } catch (\Exception $exception) {
            // dd($exception);
            return redirect('/students/classes/import')->with('error_message', 'Error occured upon importing data. Please check csv file!');
        }
    } 

    public function toImport()
    {
        return view('students.import');
    }

    public function export()
    {
        return Excel::download(new StudentsByClassExport, session()->get('present_class_name') . '_Students_' . (new \DateTime())->format(DATE_ATOM) . '.csv');
    }

    public function exportAll()
    {
        return Excel::download(new StudentsExport, 'Students_' . (new \DateTime())->format(DATE_ATOM) . '.csv');
    }
}
