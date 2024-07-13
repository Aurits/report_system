<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\ClassModel;
use App\Models\Stream;
use App\Models\House;
use Illuminate\Support\Facades\Session;

class ClassesComponent extends Component
{
    public $classId, $className;
    public $streamId, $streamName;
    public $houseId, $houseName;
    public $isClassModalOpen = false;
    public $isStreamModalOpen = false;
    public $isHouseModalOpen = false;

    protected $rules = [
        'className' => 'required',
        'streamName' => 'required',
        'houseName' => 'required',
    ];

    public function render()
    {
        $classes = ClassModel::all();
        $streams = Stream::all();
        $houses = House::all();

        return view('livewire.classes-component', compact('classes', 'streams', 'houses'));
    }

    // Methods for managing classes
    public function createClass()
    {
        $this->resetClassFields();
        $this->openClassModal();
    }

    public function openClassModal()
    {
        $this->isClassModalOpen = true;
    }

    public function closeClassModal()
    {
        $this->isClassModalOpen = false;
    }

    public function storeClass()
    {
        $this->validate([
            'className' => 'required',
        ]);

        ClassModel::create([
            'name' => $this->className,
        ]);

        Session::flash('message', 'Class created successfully.');

        $this->dispatch('closeClassModal'); // Emit event to close modal
        $this->resetClassFields();
    }

    public function editClass($id)
    {
        $class = ClassModel::findOrFail($id);
        $this->classId = $id;
        $this->className = $class->name;
        $this->openClassModal();
    }

    public function updateClass()
    {
        $this->validate([
            'className' => 'required',
        ]);

        $class = ClassModel::findOrFail($this->classId);
        $class->update([
            'name' => $this->className,
        ]);

        Session::flash('message', 'Class updated successfully.');

        $this->dispatch('closeClassModal'); // Emit event to close modal
        $this->resetClassFields();
    }

    public function deleteClass($id)
    {
        ClassModel::find($id)->delete();
        Session::flash('message', 'Class deleted successfully.');
    }

    // Methods for managing streams
    public function createStream()
    {
        $this->resetStreamFields();
        $this->openStreamModal();
    }

    public function openStreamModal()
    {
        $this->isStreamModalOpen = true;
    }

    public function closeStreamModal()
    {
        $this->isStreamModalOpen = false;
    }

    public function storeStream()
    {
        $this->validate([
            'streamName' => 'required',
        ]);

        Stream::create([
            'name' => $this->streamName,
        ]);

        Session::flash('message', 'Stream created successfully.');

        $this->dispatch('closeStreamModal'); // Emit event to close modal
        $this->resetStreamFields();
    }

    public function editStream($id)
    {
        $stream = Stream::findOrFail($id);
        $this->streamId = $id;
        $this->streamName = $stream->name;
        $this->openStreamModal();
    }

    public function updateStream()
    {
        $this->validate([
            'streamName' => 'required',
        ]);

        $stream = Stream::findOrFail($this->streamId);
        $stream->update([
            'name' => $this->streamName,
        ]);

        Session::flash('message', 'Stream updated successfully.');

        $this->dispatch('closeStreamModal'); // Emit event to close modal
        $this->resetStreamFields();
    }

    public function deleteStream($id)
    {
        Stream::find($id)->delete();
        Session::flash('message', 'Stream deleted successfully.');
    }

    // Methods for managing houses
    public function createHouse()
    {
        $this->resetHouseFields();
        $this->openHouseModal();
    }

    public function openHouseModal()
    {
        $this->isHouseModalOpen = true;
    }

    public function closeHouseModal()
    {
        $this->isHouseModalOpen = false;
    }

    public function storeHouse()
    {
        $this->validate([
            'houseName' => 'required',
        ]);

        House::create([
            'name' => $this->houseName,
        ]);

        Session::flash('message', 'House created successfully.');

        $this->dispatch('closeHouseModal'); // Emit event to close modal
        $this->resetHouseFields();
    }

    public function editHouse($id)
    {
        $house = House::findOrFail($id);
        $this->houseId = $id;
        $this->houseName = $house->name;
        $this->openHouseModal();
    }

    public function updateHouse()
    {
        $this->validate([
            'houseName' => 'required',
        ]);

        $house = House::findOrFail($this->houseId);
        $house->update([
            'name' => $this->houseName,
        ]);

        Session::flash('message', 'House updated successfully.');

        $this->dispatch('closeHouseModal'); // Emit event to close modal
        $this->resetHouseFields();
    }

    public function deleteHouse($id)
    {
        House::find($id)->delete();
        Session::flash('message', 'House deleted successfully.');
    }

    // Reset fields methods
    private function resetClassFields()
    {
        $this->className = '';
    }

    private function resetStreamFields()
    {
        $this->streamName = '';
    }

    private function resetHouseFields()
    {
        $this->houseName = '';
    }

    public $selectedHouse;
    public $selectedClass;
    public $selectedStream;

    public function viewClass($classId)
    {
        $class = ClassModel::find($classId);

        $this->selectedClass = $class;
        $this->dispatch('openClassModal');
    }


    public function viewStream($streamId)
    {
        $stream = Stream::find($streamId);
        $this->selectedStream = $stream;
        $this->dispatch('openStreamModal');
    }

    public function viewHouse($houseId)
    {
        $house = House::find($houseId);

        $this->selectedHouse = $house;

        $this->dispatch('openHouseModal');
    }
}
