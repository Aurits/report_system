<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectsComponent extends Component
{
    public $subjects;
    public $topics;
    public $newSubject = ['name' => ''];
    public $subjectDetails;
    public $newTopic = ['name' => '', 'subject_id' => ''];
    public $topicDetails;

    protected $rules = [
        'newSubject.name' => 'required|string|max:255',
        'subjectDetails.name' => 'required|string|max:255',
        'newTopic.name' => 'required|string|max:255',
        'newTopic.subject_id' => 'required|exists:subjects,id',
        'topicDetails.name' => 'required|string|max:255',
        'topicDetails.subject_id' => 'required|exists:subjects,id',
    ];

    public function render()
    {
        $this->subjects = Subject::all();
        $this->topics = Topic::with('subject')->get();
        return view('livewire.subjects-component');
    }

    public function storeSubject()
    {
        $this->validateOnly('newSubject.name');
        Subject::create(['name' => $this->newSubject['name']]);
        $this->reset('newSubject');
        $this->dispatch('close-modal', ['modal' => 'addSubjectModal']);
        //reload page
        return redirect()->route('subjects');
    }

    public function viewSubject($id)
    {
        $this->subjectDetails = Subject::find($id);
    }

    public function openEditSubjectModal($id)
    {
        $this->subjectDetails = Subject::find($id);
    }

    public function updateSubject()
    {
        $this->validateOnly('subjectDetails.name');
        $subject = Subject::find($this->subjectDetails['id']);
        $subject->update(['name' => $this->subjectDetails['name']]);
        $this->dispatch('close-modal', ['modal' => 'editSubjectModal']);
        //reload page
        return redirect()->route('subjects');
    }

    public function storeTopic()
    {
        $this->validate([
            'newTopic.name' => 'required|string|max:255',
            'newTopic.subject_id' => 'required|exists:subjects,id',
        ]);

        Topic::create($this->newTopic);
        $this->reset('newTopic');
        $this->dispatch('close-modal', ['modal' => 'addTopicModal']);
        //reload page
        return redirect()->route('subjects');
    }

    public function viewTopic($id)
    {
        $this->topicDetails = Topic::with('subject')->find($id);
    }

    public function openEditTopicModal($id)
    {
        $this->topicDetails = Topic::find($id);
    }

    public function updateTopic()
    {
        $this->validate([
            'topicDetails.name' => 'required|string|max:255',
            'topicDetails.subject_id' => 'required|exists:subjects,id',
        ]);

        $topic = Topic::find($this->topicDetails['id']);
        $topic->update(['name' => $this->topicDetails['name'], 'subject_id' => $this->topicDetails['subject_id']]);
        $this->dispatch('close-modal', ['modal' => 'editTopicModal']);
        //reload page
        return redirect()->route('subjects');
    }

    public function deleteConfirmed($id, $type)
    {
        if ($type === 'subject') {
            $this->deleteSubject($id);
        } elseif ($type === 'topic') {
            $this->deleteTopic($id);
        }
    }

    public function deleteSubject($id)
    {
        $subject = Subject::find($id);
        if ($subject) {
            $subject->delete();
        }

        session()->flash('message', 'Subject deleted successfully.');
    }

    public function deleteTopic($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
        }

        session()->flash('message', 'Topic deleted successfully.');
    }
}
