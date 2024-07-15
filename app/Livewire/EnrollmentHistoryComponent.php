<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enrollment;

class EnrollmentHistoryComponent extends Component
{
    public $processedHistory = [];
    public $studentId;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
        $this->loadEnrollmentHistory();
    }

    public function loadEnrollmentHistory()
    {
        $enrollmentHistory = Enrollment::where('student_id', $this->studentId)
            ->with(['academicYear', 'term', 'classModel', 'stream', 'house', 'subject'])
            ->get();

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

            if ($history->stream->name !== $currentStream) {
                $currentStream = $history->stream->name;
                $streamCount = $enrollmentHistory->where('academic_year_id', $history->academic_year_id)
                    ->where('term_id', $history->term_id)
                    ->where('stream_id', $history->stream_id)
                    ->count();
            }

            if ($history->house->name !== $currentHouse) {
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

    public function render()
    {
        return view('livewire.enrollment-history-component', [
            'processedHistory' => $this->processedHistory,
        ]);
    }
}
