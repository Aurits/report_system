<?php

namespace App\Livewire;

use App\Models\AcademicYear;
use App\Models\Exam;
use App\Models\Term;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SettingsComponent extends Component
{
    public $termId, $termName;
    public $academicYearId, $academicYearName;
    public $examId, $examName;
    public $isTermModalOpen = false;
    public $isAcademicYearModalOpen = false;
    public $isExamModalOpen = false;

    protected $rules = [
        'termName' => 'required',
        'academicYearName' => 'required',
        'examName' => 'required',
    ];

    // Methods for managing terms
    public function createTerm()
    {
        $this->resetTermFields();
        $this->openTermModal();
    }

    public function openTermModal()
    {
        $this->isTermModalOpen = true;
    }

    public function closeTermModal()
    {
        $this->isTermModalOpen = false;
    }

    public function storeTerm()
    {
        $this->validate([
            'termName' => 'required',
        ]);

        Term::create([
            'name' => $this->termName,
        ]);

        Session::flash('message', 'Term created successfully.');

        $this->dispatch('closeTermModal'); // Emit event to close modal
        $this->resetTermFields();
    }

    public function editTerm($id)
    {
        $term = Term::findOrFail($id);
        $this->termId = $id;
        $this->termName = $term->name;
        $this->openTermModal();
    }

    public function updateTerm()
    {
        $this->validate([
            'termName' => 'required',
        ]);

        $term = Term::findOrFail($this->termId);
        $term->update([
            'name' => $this->termName,
        ]);

        Session::flash('message', 'Term updated successfully.');

        $this->dispatch('closeTermModal'); // Emit event to close modal
        $this->resetTermFields();
    }

    public function deleteTerm($id)
    {
        Term::find($id)->delete();
        Session::flash('message', 'Term deleted successfully.');
    }

    // Methods for managing academic years
    public function createAcademicYear()
    {
        $this->resetAcademicYearFields();
        $this->openAcademicYearModal();
    }

    public function openAcademicYearModal()
    {
        $this->isAcademicYearModalOpen = true;
    }

    public function closeAcademicYearModal()
    {
        $this->isAcademicYearModalOpen = false;
    }

    public function storeAcademicYear()
    {
        $this->validate([
            'academicYearName' => 'required',
        ]);

        // dd($this->academicYearName);

        AcademicYear::create([
            'year' => $this->academicYearName,
        ]);

        Session::flash('message', 'Academic Year created successfully.');

        $this->dispatch('closeAcademicYearModal'); // Emit event to close modal
        $this->resetAcademicYearFields();
    }

    public function editAcademicYear($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $this->academicYearId = $id;
        $this->academicYearName = $academicYear->year;
        $this->openAcademicYearModal();
    }

    public function updateAcademicYear()
    {
        $this->validate([
            'academicYearName' => 'required',
        ]);

        $academicYear = AcademicYear::findOrFail($this->academicYearId);
        $academicYear->update([
            'year' => $this->academicYearName,
        ]);

        Session::flash('message', 'Academic Year updated successfully.');

        $this->dispatch('closeAcademicYearModal'); // Emit event to close modal
        $this->resetAcademicYearFields();
    }

    public function deleteAcademicYear($id)
    {
        AcademicYear::find($id)->delete();
        Session::flash('message', 'Academic Year deleted successfully.');
    }


    // Methods for managing exams
    public function createExam()
    {
        $this->resetExamFields();
        $this->openExamModal();
    }

    public function openExamModal()
    {
        $this->isExamModalOpen = true;
    }

    public function closeExamModal()
    {
        $this->isExamModalOpen = false;
    }

    public function storeExam()
    {
        $this->validate([
            'examName' => 'required',
        ]);

        Exam::create([
            'name' => $this->examName,
        ]);

        Session::flash('message', 'Exam created successfully.');

        $this->dispatch('closeExamModal'); // Emit event to close modal
        $this->resetExamFields();
    }

    public function editExam($id)
    {
        $exam = Exam::findOrFail($id);
        $this->examId = $id;
        $this->examName = $exam->name;
        $this->openExamModal();
    }

    public function updateExam()
    {
        $this->validate([
            'examName' => 'required',
        ]);

        $exam = Exam::findOrFail($this->examId);
        $exam->update([
            'name' => $this->examName,
        ]);

        Session::flash('message', 'Exam updated successfully.');

        $this->dispatch('closeExamModal'); // Emit event to close modal
        $this->resetExamFields();
    }

    public function deleteExam($id)
    {
        Exam::find($id)->delete();
        Session::flash('message', 'Exam deleted successfully.');
    }

    // Reset fields methods
    private function resetTermFields()
    {
        $this->termName = '';
    }

    private function resetAcademicYearFields()
    {
        $this->academicYearName = '';
    }

    private function resetExamFields()
    {
        $this->examName = '';
    }

    public $selectedTerm;
    public $selectedAcademicYear;
    public $selectedExam;

    public function viewTerm($termId)
    {
        $term = Term::find($termId);

        $this->selectedTerm = $term;
        $this->dispatch('openTermModal');
    }

    public function viewAcademicYear($yearId)
    {
        $year = AcademicYear::find($yearId);
        $this->selectedAcademicYear = $year;
        $this->dispatch('openAcademicYearModal');
    }

    public function viewExam($examId)
    {
        $exam = Exam::find($examId);
        $this->selectedExam = $exam;
        $this->dispatch('openExamModal');
    }

    public function render()
    {
        $terms = Term::all();
        $academicYears = AcademicYear::all();
        $exams = Exam::all();

        return view('livewire.settings-component', compact('terms', 'academicYears', 'exams'));
    }
}
