<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\ClassModel; // Ensure you have this model
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Exports\StudentsTemplateExport;
use Illuminate\Support\Facades\Session;

class StudentsComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $student_id, $name, $gender, $email, $phone, $class_id;
    public $editMode = false;
    public $studentToEdit, $studentToView;
    public $bulkUploadFile;
    public $sessionMessage;
    public $sessionType;
    public $classes;

    protected $rules = [
        'student_id' => 'required|unique:students,student_id',
        'name' => 'required',
        'gender' => 'nullable|in:Male,Female,Others',
        'email' => 'nullable|email',
        'phone' => 'nullable|numeric',
        'class_id' => 'required|exists:class_models,id', // Add validation rule for class
    ];

    public function mount()
    {
        $this->sessionMessage = Session::get('message');
        $this->sessionType = Session::get('type', 'success'); // Default type is success
        $this->classes = ClassModel::all(); // Load all classes
    }

    public function resetInputFields()
    {
        $this->student_id = '';
        $this->name = '';
        $this->gender = '';
        $this->email = '';
        $this->phone = '';
        $this->class_id = ''; // Reset class_id
        $this->editMode = false;
        $this->studentToEdit = null;
        $this->studentToView = null;
        $this->resetMessage();
    }

    public function store()
    {
        $this->validate();

        Student::create([
            'student_id' => $this->student_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'class_id' => $this->class_id, // Include class_id
        ]);

        $this->sessionMessage = 'Student Created Successfully.';
        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->editMode = true;
        $this->studentToEdit = Student::findOrFail($id);
        $this->student_id = $this->studentToEdit->student_id;
        $this->name = $this->studentToEdit->name;
        $this->gender = $this->studentToEdit->gender;
        $this->email = $this->studentToEdit->email;
        $this->phone = $this->studentToEdit->phone;
        $this->class_id = $this->studentToEdit->class_id; // Include class_id

        $this->dispatch('open-edit-modal');
    }

    public function update()
    {
        $this->validate([
            'student_id' => 'required|unique:students,student_id,' . $this->studentToEdit->id,
            'name' => 'required',
            'gender' => 'nullable|in:Male,Female,Others',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'class_id' => 'required|exists:class_models,id', // Add validation rule for class
        ]);

        $this->studentToEdit->update([
            'student_id' => $this->student_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'class_id' => $this->class_id, // Include class_id
        ]);

        $this->sessionMessage = 'Student Updated Successfully.';
        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function view($id)
    {
        $student = Student::with('classModel')->find($id); // Load the student with the class relationship
        $this->studentToView = [
            'student_id' => $student->student_id,
            'name' => $student->name,
            'gender' => $student->gender,
            'email' => $student->email,
            'phone' => $student->phone,
            'class' => $student->classModel->name ?? 'N/A', // Include class name
        ];

        $this->dispatch('open-view-modal');
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        $this->sessionMessage = 'Student Deleted Successfully.';
        $this->resetInputFields();
    }

    public function uploadBulk()
    {
        $this->validate(['bulkUploadFile' => 'required|mimes:xlsx,xls,csv']);
        Excel::import(new StudentsImport, $this->bulkUploadFile->store('temp'));
        $this->sessionMessage = 'Bulk upload successful.';
        $this->reset('bulkUploadFile');
        $this->dispatch('close-modal');
    }

    public function downloadTemplate()
    {
        return Excel::download(new StudentsTemplateExport, 'students_template.xlsx');
    }

    public function resetMessage()
    {
        $this->sessionMessage = null;
        $this->sessionType = 'success'; // Reset to default success type
    }

    public function render()
    {
        return view('livewire.students-component', [
            'students' => Student::with('classModel')->paginate(2000), // Load the class relationship
        ]);
    }
}
