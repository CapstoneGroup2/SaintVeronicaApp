<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Student;
use App\Models\MiscellaneousAndOtherFees;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        if (request()->ajax())
        {
            return datatables()->of($items)
                ->addColumn('code', function($data) {
                    return '<span style="font-weight: bold; font-size: 15px;">' . $data->code . '</span>';
                })
                ->addColumn('item', function($data) {
                    return '<span style="font-weight: bold; font-size: 15px;">' . $data->item . '</span>';
                })
                ->addColumn('price', function($data) {
                    return '<span style="font-weight: bold; font-size: 15px;">Php ' . number_format($data->price, 2) . '</span>';
                })
                ->addColumn('action', function($data) {
                    $button = '<a href="/item/'. $data->id .'/edit
                    " data-toggle="tooltip" title="Edit" class="btn btn-md btn-warning" role="button" style="margin: 2px; padding: 0 2%"><span class="glyphicon glyphicon-pencil"></span></a>';
                    return $button;
                })
                ->rawColumns(['code', 'item', 'price', 'action'])
                ->make(true);
        }
        
        return view('item.index', compact('items'));
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'class_name'          =>  'required|unique:classes',
    //         'class_description'   =>  'nullable'
    //     ]);

    //     $class = new Classes();
    //     $class->class_name = ucwords(strtolower($request['class_name']));
    //     $class->class_description = $request['class_description'];
    //     $class->save();

    //     $class = Classes::where('class_name', $request['class_name'])->get();
    //     $classes = session()->get('classes');
    //     array_push($classes, [$request['class_name'], $class[0]->id]);

    //     session()->put('classes', $classes);
        
    //     return redirect('/miscellaneous-and-other-fees/classes/' . $class[0]->id)->with('success', 'Class has successfully created!');
    // }

    // public function edit($id)    
    // {
    //     $class = Classes::find($id);
    //     return view('classes.edit', compact('class'));
    // }
    
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'class_name'          =>  'required|unique:classes,class_name,'.$id,
    //         'class_description'   =>  'nullable'
    //     ]);

    //     $class = Classes::find($id);
    //     $class->class_name = ucwords(strtolower($request['class_name']));
    //     $class->class_description = $request['class_description'];
    //     $class->save();

    //     return redirect('/classes')->with('success', 'Class information has successfully updated!');
    // }

    // public function destroy($id)
    // {
    //     $items = MiscellaneousAndOtherFees::where('class_id', $id)->get();
    //     try {
    //         if(isset($items[0])) {
    //             PaymentsHistory::where('student_id', $id)->delete(); 
    //         }

    //         $class = Classes::find($id)->delete();

    //         $students_classes = DB::table('students_classes')
    //             ->join('students', 'students.id', '=', 'students_classes.student_id')
    //             ->join('classes', 'classes.id', '=', 'students_classes.class_id')
    //             ->get();

    //         $classes = Classes::all();
    //         $students = Student::all();

    //         $students_count = [];
    //         $put_sessions = [];

    //         foreach($classes as $class) {
    //             $student_count = [];
    //             $student_count['class_id'] = $class->id;
    //             $student_count['class_name'] = $class->class_name;

    //             $count = 0;
    //             foreach ($students_classes as $student_class) {
    //                 if ($student_class->class_id == $class->id) {
    //                     ++$count;
    //                 }
    //             }

    //             $student_count['class_count'] = $count;
    //             array_push($students_count, $student_count);
    //             array_push($put_sessions, [$class->class_name, $class->id]);
    //         }

    //         session()->put('classes', $put_sessions);
    //     } catch (\Exception $exception) {

        // }
    // }

}
