<?php

namespace App\Livewire;

use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TeachersImport;
use App\Exports\TeachersTemplateExport;

class TeachersComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $teacher_id, $name, $gender, $email, $phone;
    public $editMode = false;
    public $teacherToEdit, $teacherToView;
    public $bulkUploadFile;

    protected $rules = [
        'teacher_id' => 'required|unique:teachers,teacher_id',
        'name' => 'required',
        'gender' => 'nullable|in:Male,Female,Others',
        'email' => 'nullable|email',
        'phone' => 'nullable|numeric'
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->teacher_id = '';
        $this->name = '';
        $this->gender = '';
        $this->email = '';
        $this->phone = '';
        $this->editMode = false;
        $this->teacherToEdit = null;
        $this->teacherToView = null;
    }

    public function store()
    {

        try {
            $this->validate();

            Teacher::create([
                'teacher_id' => $this->teacher_id,
                'name' => $this->name,
                'gender' => $this->gender,
                'email' => $this->email,
                'phone' => $this->phone
            ]);

            Session::flash('message', 'Teacher Created Successfully.');

            $this->resetInputFields();

            // Sleep for 2 seconds
            sleep(2);

            // Redirect to the teachers page
            return redirect()->to('/teachers');
        } catch (Exception $e) {
            Session::flash('error_message', 'An error occured');
        }
    }

    public function edit($id)
    {
        $this->editMode = true;
        $this->teacherToEdit = Teacher::findOrFail($id);
        $this->teacher_id = $this->teacherToEdit->teacher_id;
        $this->name = $this->teacherToEdit->name;
        $this->gender = $this->teacherToEdit->gender;
        $this->email = $this->teacherToEdit->email;
        $this->phone = $this->teacherToEdit->phone;

        $this->dispatch('openEditModal');
    }

    public function update()
    {
        $this->validate([
            'teacher_id' => 'required|unique:teachers,teacher_id,' . $this->teacherToEdit->id,
            'name' => 'required',
            'gender' => 'nullable|in:Male,Female,Others',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric'
        ]);

        $this->teacherToEdit->update([
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        Session::flash('message', 'Teacher Updated Successfully.');

        $this->resetInputFields();
        // Sleep for 2 seconds
        sleep(2);

        // Redirect to the teachers page
        return redirect()->to('/teachers');
    }

    protected $listeners = [
        'viewTeacher' => 'view'
    ];

    public function view($id)
    {
        $teacher = Teacher::find($id);

        $this->teacherToView = [
            'teacher_id' => $teacher->teacher_id,
            'name' => $teacher->name,
            'gender' => $teacher->gender,
            'email' => $teacher->email,
            'phone' => $teacher->phone,
        ];

        $this->dispatch('openViewModal');
    }

    public function delete($id)
    {
        Teacher::findOrFail($id)->delete();
        Session::flash('message', 'Teacher Deleted Successfully.');
        $this->resetInputFields();
        // Sleep for 2 seconds
        sleep(2);

        // Redirect to the teachers page
        return redirect()->to('/teachers');
    }

    public function uploadBulk()
    {
        try {
            $this->validate([
                'bulkUploadFile' => 'required|mimes:xlsx,xls,csv',
            ]);

            Excel::import(new TeachersImport, $this->bulkUploadFile->store('temp'));
            Session::flash('message', 'Bulk upload successful.');
            $this->reset('bulkUploadFile');
            // Sleep for 2 seconds
            sleep(2);

            // Redirect to the teachers page
            return redirect()->to('/teachers');
        } catch (Exception $e) {
            Session::flash('error_message', 'An error occured');
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new TeachersTemplateExport, 'teachers_template.xlsx');
    }

    public function render()
    {
        return view('livewire.teachers-component', [
            'teachers' => Teacher::paginate(100),
        ]);
    }
}
