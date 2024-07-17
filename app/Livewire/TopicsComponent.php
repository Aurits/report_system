<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Enrollment;
use App\Models\Term; // Add Term model

class TopicsComponent extends Component
{
    public $academicYears;
    public $classes;
    public $streams;
    public $subjects;
    public $terms;
    public $marks;

    public $selectedYear;
    public $selectedClass;
    public $selectedStream;
    public $selectedSubject;
    public $selectedTerm;

    public function mount()
    {
        $this->academicYears = AcademicYear::all();
        $this->classes = ClassModel::all();
        $this->streams = Stream::all();
        $this->subjects = Subject::all();
        $this->terms = Term::all(); // Load terms
        $this->loadMarks();
    }

    public function loadMarks()
    {
        $query = Mark::query()
            ->with(['enrollment.student', 'enrollment.subject', 'enrollment.academicYear', 'enrollment.classModel', 'enrollment.stream', 'topic']);

        if ($this->selectedYear) {
            $query->whereHas('enrollment', function ($q) {
                $q->where('academic_year_id', $this->selectedYear);
            });
        }

        if ($this->selectedClass) {
            $query->whereHas('enrollment', function ($q) {
                $q->where('class_id', $this->selectedClass);
            });
        }

        if ($this->selectedStream) {
            $query->whereHas('enrollment', function ($q) {
                $q->where('stream_id', $this->selectedStream);
            });
        }

        if ($this->selectedSubject) {
            $query->whereHas('enrollment', function ($q) {
                $q->where('subject_id', $this->selectedSubject);
            });
        }

        if ($this->selectedTerm) {
            $query->whereHas('enrollment', function ($q) {
                $q->where('term_id', $this->selectedTerm);
            });
        }

        $this->marks = $query->get();
    }



    public function render()
    {
        return view('livewire.topics-component');
    }
}