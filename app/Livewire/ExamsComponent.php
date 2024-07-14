<?php

namespace App\Livewire;

use App\Models\ClassModel;
use App\Models\Exam;
use App\Models\Stream;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Livewire\Component;

class ExamsComponent extends Component
{
    public $students;
    public $class_id;
    public $stream_id;
    public $subject_id;
    public function mount()
    {
        $this->students =[];
    }

    public function search()
    {
        $query = Student::query();

        if ($this->class_id) {
            $query->where('class_id', $this->class_id);
        }

        if ($this->stream_id) {
            $query->where('stream_id', $this->stream_id);
        }

        if ($this->subject_id) {
            $query->where('subject_id', $this->subject_id);
        }

        // Retrieve students matching the search criteria
        $this->students = $query->get()->toArray();
    }

    public function render()
    {
        return view('livewire.exams-component', [
            'classes' => ClassModel::all(),
            'streams' => Stream::all(),
            'subjects' => Subject::all(),
            'students' => $this->students
        ]);
    }

}


