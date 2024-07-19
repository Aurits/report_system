<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AcademicYear;
use App\Models\Activity;
use App\Models\ClassModel;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Enrollment;
use App\Models\Term;
use Illuminate\Support\Facades\Session;

class TopicsComponent extends Component
{
    public $academicYears;
    public $classes;
    public $streams;
    public $subjects;
    public $terms;

    public $marks = [];

    public $topic_id = 1;

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
            $activity = $enrollment->activities->first();
            return [
                $enrollment->id => [
                    'marks_aoi' => $activity ? $activity->marks_aoi : '',
                    'marks_activity_1' => $activity ? $activity->marks_activity_1 : '',
                    'marks_activity_2' => $activity ? $activity->marks_activity_2 : '',
                    'marks_activity_3' => $activity ? $activity->marks_activity_3 : '',
                    'marks_activity_4' => $activity ? $activity->marks_activity_4 : '',
                    'marks_activity_5' => $activity ? $activity->marks_activity_5 : '',
                ]
            ];
        })->toArray();
    }

    public function saveMarks($enrollmentId)
    {
        $enrollment = Enrollment::find($enrollmentId);
        if ($enrollment) {
            $markData = $this->marks[$enrollmentId] ?? ['marks_aoi' => 0, 'marks_activity_1' => 0, 'marks_activity_2' => 0, 'marks_activity_3' => 0, 'marks_activity_4' => 0, 'marks_activity_5' => 0];

            $activity = Activity::updateOrCreate(
                [
                    'enrollment_id' => $enrollment->id,
                    'topic_id' => $this->topic_id,
                ],
                [
                    'marks_aoi' => $markData['marks_aoi'],
                    'marks_activity_1' => $markData['marks_activity_1'],
                    'marks_activity_2' => $markData['marks_activity_2'],
                    'marks_activity_3' => $markData['marks_activity_3'],
                    'marks_activity_4' => $markData['marks_activity_4'],
                    'marks_activity_5' => $markData['marks_activity_5'],
                ]
            );

            Session::flash('marks', 'Marks updated successfully.');
        }
    }

    public function saveAllMarks()
    {
        foreach ($this->marks as $enrollmentId => $activityMarks) {
            $this->saveMarks($enrollmentId);
        }
    }

    public function render()
    {
        return view('livewire.topics-component');
    }
}
