<?php

namespace App\Livewire\Backend\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;

    public $banner;

    public $description;

    public $startDate;

    public $dueDate;

    public $published;

    public $projectID;

    public $preview = null;

    public $project;

    protected $rules = [
        'title' => 'required',
        'startDate' => 'required|date',
        'dueDate' => 'required|date'
    ];

    public function mount($projectID = null) {
        $this->projectID = $projectID;
        $this->published = true;
        $this->startDate = date('Y-m-d');
        $this->dueDate = date('Y-m-d', strtotime('+1 months'));
        if ($this->projectID) {
            $this->project = Project::where('user_id', Auth()->user()->id)
                ->find($this->projectID);
            $this->title = $this->project->title;
            $this->description = $this->project->description;
            $this->startDate = $this->project->start_date;
            $this->dueDate = $this->project->due_date;
            $this->preview = $this->project->banner;
            $this->published = $this->project->published;
        }
    }

    public function close() {
        $this->dispatch('close-project-add');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $this->validate();
        if ($this->projectID) {
            $this->update();
        } else {
            $this->validate(['banner' => 'required|mimes:jpeg,jpg,png|max:2048']);
            $this->create();
        }
        // $this->dispatch('project-saved');
        return $this->redirect('/projects');
    }

    public function create() {
        $data = [
            'title' => $this->title,
            'banner' => $this->banner->hashName(),
            'description' => $this->description,
            'start_date' => $this->startDate,
            'due_date' => $this->dueDate,
            'user_id' => Auth()->user()->id
        ];

        Project::create($data);

        $this->banner->store(path: 'public/resource/images');
    }

    public function update() {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->startDate,
            'due_date' => $this->dueDate,
            'user_id' => Auth()->user()->id
        ];
        if ($this->banner) {
            $this->validate(['banner' => 'mimes:jpeg,jpg,png|max:2048']);
            $data['banner'] = $this->banner->hashName();
            $this->banner->store(path: 'public/resource/images');
        }

        Project::where('id', $this->projectID)->update($data);
    }

    public function updatedBanner() {

    }

    public function render()
    {
        return view('livewire.backend.project.create');
    }
}
