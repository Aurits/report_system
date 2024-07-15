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
    public $subjectsSelected = [];
    public $classId;
    public $academicYearId;
    public $termId;
    public $streamId;
    public $houseId;
    public $studentsByClass = [];

    public function mount()
    {
        $this->loadStudentsByClass();
    }

    public function loadStudentsByClass()
    {
        for ($i = 1; $i <= 6; $i++) {
            $this->studentsByClass[$i] = Student::with('classModel')->where('class_id', $i)->get();
        }
    }

    public function toggleAllStudentsByClass($classId)
    {
        $studentsInClass = $this->studentsByClass[$classId]->pluck('id')->toArray();
        if (count(array_intersect($this->studentsSelected, $studentsInClass)) === count($studentsInClass)) {
            $this->studentsSelected = array_diff($this->studentsSelected, $studentsInClass);
        } else {
            $this->studentsSelected = array_unique(array_merge($this->studentsSelected, $studentsInClass));
        }
    }

    public function toggleAllSubjects()
    {
        $subjects = Subject::pluck('id')->toArray();

        if (count(array_intersect($this->subjectsSelected, $subjects)) === count($subjects)) {
            $this->subjectsSelected = [];
        } else {
            $this->subjectsSelected = $subjects;
        }
    }

    public function enrollStudents()
    {
        $this->validate([
            'studentsSelected' => 'required',
            'classId' => 'required',
            'academicYearId' => 'required',
            'termId' => 'required',
        ]);

        foreach ($this->studentsSelected as $studentId) {
            foreach ($this->subjectsSelected as $subjectId) {
                Enrollment::create([
                    'student_id' => $studentId,
                    'class_id' => $this->classId,
                    'academic_year_id' => $this->academicYearId,
                    'term_id' => $this->termId,
                    'subject_id' => $subjectId,
                    'stream_id' => $this->streamId,
                    'house_id' => $this->houseId,
                ]);
            }
        }

        Session::flash('message', 'Students enrolled successfully.');

        $this->reset(['studentsSelected', 'classId', 'academicYearId', 'termId', 'streamId', 'houseId']);
        $this->loadStudentsByClass();
    }

    public function render()
    {
        return view('livewire.enrollments-component', [
            'students' => Student::all(),
            'subjects' => Subject::all(),
            'classes' => ClassModel::all(),
            'academicYears' => AcademicYear::all(),
            'terms' => Term::all(),
            'streams' => Stream::all(),
            'houses' => House::all(),
        ]);
    }
}
