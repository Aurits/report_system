<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsTemplateExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new Collection([
            ['student_id', 'name', 'gender', 'email', 'phone'],
        ]);
    }
}
