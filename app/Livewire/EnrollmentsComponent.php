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

    public $enrollmentHistory;
    public $processedHistory = []; // Initialize the property



    public function mount()
    {
        $this->loadStudentsByClass();
        $this->showEnrollmentHistory(); // Load history during mount
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

    public function showEnrollmentHistory()
    {
        $enrollmentHistory = Enrollment::with(['academicYear', 'term', 'classModel', 'stream', 'house', 'subject'])->get();

        $processedHistory = [];
        $currentYear = '';
        $currentTerm = '';
        $currentStream = '';
        $currentHouse = '';
        $yearCount = 0;
        $termCount = 0;
        $streamCount = 0;
        $houseCount = 0;

        foreach ($enrollmentHistory as $history) {
            if ($history->academicYear->year !== $currentYear) {
                $currentYear = $history->academicYear->year;
                $yearCount = $enrollmentHistory->where('academic_year_id', $history->academic_year_id)->count();
            }

            if ($history->term->name !== $currentTerm) {
                $currentTerm = $history->term->name;
                $termCount = $enrollmentHistory->where('academic_year_id', $history->academic_year_id)
                    ->where('term_id', $history->term_id)
                    ->count();
            }

            if ($history->stream && $history->stream->name !== $currentStream) {
                $currentStream = $history->stream->name;
                $streamCount = $enrollmentHistory->where('academic_year_id', $history->academic_year_id)
                    ->where('term_id', $history->term_id)
                    ->where('stream_id', $history->stream_id)
                    ->count();
            }

            if ($history->house && $history->house->name !== $currentHouse) {
                $currentHouse = $history->house->name;
                $houseCount = $enrollmentHistory->where('academic_year_id', $history->academic_year_id)
                    ->where('term_id', $history->term_id)
                    ->where('stream_id', $history->stream_id)
                    ->where('house_id', $history->house_id)
                    ->count();
            }

            $processedHistory[] = [
                'history' => $history,
                'yearRowspan' => $yearCount,
                'termRowspan' => $termCount,
                'streamRowspan' => $streamCount,
                'houseRowspan' => $houseCount,
            ];
        }

        $this->processedHistory = $processedHistory;
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
                // Check if the enrollment already exists
                $enrollment = Enrollment::where([
                    'student_id' => $studentId,
                    'class_id' => $this->classId,
                    'academic_year_id' => $this->academicYearId,
                    'term_id' => $this->termId,
                    'subject_id' => $subjectId,
                ])->first();

                if ($enrollment) {
                    // Update the existing enrollment
                    $enrollment->update([
                        'stream_id' => $this->streamId,
                        'house_id' => $this->houseId,
                    ]);
                } else {
                    // Create a new enrollment
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
            'processedHistory' => $this->processedHistory, // Pass processedHistory to the view
        ]);
    }
}
