<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = DB::table('students_classes')
            ->join('students', 'students.id', '=', 'students_classes.student_id')
            ->join('classes', 'classes.id', '=', 'students_classes.class_id')
            ->select(
                'students.id',
                'classes.class_name',
                'students.student_first_name',
                'students.student_middle_name',
                'students.student_last_name',
                'students.student_email',
                'students.student_home_contact',
                'students.student_address',
                'students.student_gender',
                'students.student_age',
                'students.student_birth_date',
                'students.student_mother_name',
                'students.student_mother_contact_number',
                'students.student_father_name',
                'students.student_father_contact_number',
                'students.student_guardian_name',
                'students.student_guardian_contact_number',
                'students.student_image',
                'students.created_at')
            ->get();

        return $students;
    }

    public function headings(): array
    {
        return [
            'ID #',
            'Class Name',
            'First Name',
            'Middle Name',
            'Last Name',
            'Email Address',
            'Contact #',
            'Home Address',
            'Gender',
            'Age',
            'Birthdate',
            "Mother's Name",
            "Mother's Contact #",
            "Father's Name",
            "Father's Contact #",
            "Guardian's Name",
            "Guardian's Contact #",
            "Image",
            'Created At'
        ];
    }
}
