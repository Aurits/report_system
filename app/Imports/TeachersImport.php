<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Teacher([
            'teacher_id' => $row['teacher_id'],
            'name' => $row['name'],
            'gender' => $row['gender'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ]);
    }
}
