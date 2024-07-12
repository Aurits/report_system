<?php

namespace App\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class TeachersComponent extends Component
{
    public $teacher_id, $name, $gender, $email, $phone;
    public $teachers;
    public $editMode = false;
    public $teacherToEdit;

    protected $rules = [
        'teacher_id' => 'required|unique:teachers,teacher_id',
        'name' => 'required',
        'gender' => 'nullable|in:Male,Female,Others',
        'email' => 'nullable|email',
        'phone' => 'nullable|numeric'
    ];

    public function mount()
    {
        $this->teachers = Teacher::all();
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
    }

    public function store()
    {
        $this->validate();

        Teacher::create([
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone
        ]);


        $this->resetInputFields();
        $this->teachers = Teacher::all();
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

        $this->emit('openModal', '#addTeacherModal');
    }

    public function update()
    {
        $this->validate();

        $this->teacherToEdit->update([
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone
        ]);


        $this->resetInputFields();
        $this->teachers = Teacher::all();
    }

    public function render()
    {
        return view('livewire.teachers-component');
    }
}
