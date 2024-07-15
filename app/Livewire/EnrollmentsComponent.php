<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\AcademicYear;
use App\Models\Stream;
use App\Models\House;
use App\Models\Subject;
use App\Models\Term;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EnrollmentsComponent extends Component
{
    public $studentsSelected = [];
    public $classId;
    public $academicYearId;
    public $termId;
    public $streamId;
    public $subjectId;
    public $houseId;

    public function render()
    {
        $students = Student::all();
        $classes = ClassModel::all();
        $academicYears = AcademicYear::all();
        $terms = Term::all();
        $streams = Stream::all();
        $subjects = Subject::all();
        $houses = House::all();

        return view('livewire.enrollments-component', compact('students', 'classes', 'academicYears', 'terms', 'streams', 'subjects', 'houses'));
    }

    public function enrollStudents()
    {
        $this->validate([
            'studentsSelected' => 'required|array',
            'classId' => 'required|exists:class_models,id',
            'academicYearId' => 'required|exists:academic_years,id',
            'termId' => 'required|exists:terms,id',
            'streamId' => 'nullable|exists:streams,id',
            'subjectId' => 'required|exists:subjects,id',
            'houseId' => 'nullable|exists:houses,id',
        ]);

        foreach ($this->studentsSelected as $studentId) {
            Enrollment::create([
                'student_id' => $studentId,
                'class_id' => $this->classId,
                'academic_year_id' => $this->academicYearId,
                'term_id' => $this->termId,
                'stream_id' => $this->streamId,
                'subject_id' => $this->subjectId,
                'house_id' => $this->houseId,
            ]);
        }

        Session::flash('message', 'Students enrolled successfully.');

        $this->reset(['studentsSelected', 'classId', 'academicYearId', 'termId', 'streamId', 'subjectId', 'houseId']);
    }
}
