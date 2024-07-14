<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Support\Facades\Session;

class SubjectsComponent extends Component
{
    public $subjects;
    public $topics;
    public $newSubject = ['name' => ''];
    public $subjectDetails = ['id' => '', 'name' => ''];
    public $newTopic = ['name' => '', 'subject_id' => ''];
    public $topicDetails = ['id' => '', 'name' => '', 'subject' => ['name' => ''], 'subject_id' => ''];

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
        return redirect()->route('subjects');
    }

    public function viewSubject($id)
    {
        $this->subjectDetails = Subject::find($id)->toArray();
        $this->dispatch('openModal', ['id' => 'viewSubjectModal']);
    }

    public function openEditSubjectModal($id)
    {
        $this->subjectDetails = Subject::find($id)->toArray();
        $this->dispatch('openModal', ['id' => 'editSubjectModal']);
    }

    public function updateSubject()
    {
        $this->validateOnly('subjectDetails.name');
        $subject = Subject::find($this->subjectDetails['id']);
        $subject->update(['name' => $this->subjectDetails['name']]);
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
        return redirect()->route('subjects');
    }

    public function viewTopic($id)
    {
        $this->topicDetails = Topic::with('subject')->find($id)->toArray();
        $this->dispatch('openModal', ['id' => 'viewTopicModal']);
    }

    public function openEditTopicModal($id)
    {
        $this->topicDetails = Topic::find($id)->toArray();
        $this->dispatch('openModal', ['id' => 'editTopicModal']);
    }

    public function updateTopic()
    {
        $this->validate([
            'topicDetails.name' => 'required|string|max:255',
            'topicDetails.subject_id' => 'required|exists:subjects,id',
        ]);

        $topic = Topic::find($this->topicDetails['id']);
        $topic->update(['name' => $this->topicDetails['name'], 'subject_id' => $this->topicDetails['subject_id']]);
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

        Session::flash('message', 'Subject deleted successfully.');
    }

    public function deleteTopic($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
        }

        Session::flash('message', 'Topic deleted successfully.');
    }
}
