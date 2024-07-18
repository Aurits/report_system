<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Enrollment;
use App\Models\Term;
use Illuminate\Support\Facades\Session;

class ExamsComponent extends Component
{
    public $academicYears;
    public $classes;
    public $streams;
    public $subjects;
    public $terms;

    public $marks = [];
    public $selectedAssessmentType = 'Exam'; // default value

    public $enrollments;
    public $selectedYear;
    public $selectedClass;
    public $selectedStream;
    public $selectedSubject;
    public $selectedTerm;
    protected $listeners = ['saveMarks'];
    public function mount()
    {
        $this->academicYears = AcademicYear::all();
        $this->classes = ClassModel::all();
        $this->streams = Stream::all();
        $this->subjects = Subject::all();
        $this->terms = Term::all();
        $this->enrollments = collect();
    }

    public function loadEnrollments()
    {
        $query = Enrollment::query()
            ->with(['student']);

        if ($this->selectedYear) {
            $query->where('academic_year_id', $this->selectedYear);
        }

        if ($this->selectedClass) {
            $query->where('class_id', $this->selectedClass);
        }

        if ($this->selectedStream) {
            $query->where('stream_id', $this->selectedStream);
        }

        if ($this->selectedSubject) {
            $query->where('subject_id', $this->selectedSubject);
        }

        if ($this->selectedTerm) {
            $query->where('term_id', $this->selectedTerm);
        }

        $this->enrollments = $query->get();

        $this->marks = $this->enrollments->mapWithKeys(function ($enrollment) {
            $mark = $enrollment->marks->first();
            return [$enrollment->id => $mark ? $mark->marks_obtained : ''];
        })->toArray();
    }

    public function saveMarks($enrollmentId)
    {
        $enrollment = Enrollment::find($enrollmentId);
        if ($enrollment) {
            $mark = Mark::updateOrCreate(
                [
                    'enrollment_id' => $enrollment->id,
                    'term_id' => $this->selectedTerm,
                    'assessment_type' => $this->selectedAssessmentType
                ],
                [
                    'marks_obtained' => $this->marks[$enrollmentId] ?? 0
                ]
            );

            Session::flash('marks', 'Marks updated successfully.');
        }
    }


    public function saveAllMarks()
    {
        foreach ($this->marks as $enrollmentId => $obtainedMarks) {
            $this->saveMarks($enrollmentId);
        }
    }

    public function render()
    {
        return view('livewire.exams-component');
    }
}
