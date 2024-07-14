<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\AcademicYear;
use App\Models\Stream;
use App\Models\House;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EnrollmentsComponent extends Component
{


    public $studentsSelected = [];
    public $classId;
    public $academicYearId;
    public $streamId;
    public $houseId;

    public function render()
    {
        $students = Student::all();
        $classes = ClassModel::all();
        $academicYears = AcademicYear::all();
        $streams = Stream::all();
        $houses = House::all();



        return view('livewire.enrollments-component', compact('students', 'classes', 'academicYears', 'streams', 'houses'));
    }

    public function enrollStudents()
    {
        $this->validate([
            'studentsSelected' => 'required|array',
            'students.*' => 'exists:students,id',
            'classId' => 'required|exists:class_models,id',
            'academicYearId' => 'required|exists:academic_years,id',
            'streamId' => 'nullable|exists:streams,id',
            'houseId' => 'nullable|exists:houses,id',
        ]);

        foreach ($this->studentsSelected as $studentId) {
            Enrollment::create([
                'student_id' => $studentId,
                'class_id' => $this->classId,
                'academic_year_id' => $this->academicYearId,
                'stream_id' => $this->streamId,
                'house_id' => $this->houseId,
            ]);
        }

        Session::flash('message', 'Students enrolled successfully.');

        $this->reset(['students', 'classId', 'academicYearId', 'streamId', 'houseId']);
    }
}
