<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'student_id' => $row['student_id'],
            'name' => $row['name'],
            'gender' => $row['gender'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'class_id' => $row['class_id']
        ]);
    }
}
