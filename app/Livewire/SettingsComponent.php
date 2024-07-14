<?php

namespace App\Livewire;

use App\Models\AcademicYear;
use Livewire\Component;
use App\Models\Term;
use Illuminate\Support\Facades\Session;

class SettingsComponent extends Component
{
    public $termId, $termName;
    public $academicYearId, $academicYearName;
    public $isTermModalOpen = false;
    public $isAcademicYearModalOpen = false;

    protected $rules = [
        'termName' => 'required',
        'academicYearName' => 'required',
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

    // Reset fields methods
    private function resetTermFields()
    {
        $this->termName = '';
    }

    private function resetAcademicYearFields()
    {
        $this->academicYearName = '';
    }

    public $selectedTerm;
    public $selectedAcademicYear;

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

    public function render()
    {
        $terms = Term::all();
        $academicYears = AcademicYear::all();

        return view('livewire.settings-component', compact('terms', 'academicYears'));
    }
}
