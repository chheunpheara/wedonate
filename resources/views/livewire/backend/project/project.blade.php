<div>
    <div class="row">
        <h4>My Projects</h4>
        <div class="col-sm-12 mb-3">
            <div class="add-new-project" wire:click="openFormAdd()">
                <span class="material-icons">add</span>
            </div>
        </div>
        @if($projects->isEmpty())
        <div class="mb-5"></div>
            <div class="text-center">
                <span class="material-icons text-warning" style="font-size: 5em">search</span>
                <p>No project has been created</p>
            </div>
        @endif
        @foreach($projects as $key => $project)
        <div class="col-sm-2 mb-3 view-inline-project" id="project-{{ $key }}" title="{{ $project->title }}" wire:click.prevent="edit({{ $project->id }})">
            <div class="card">
                <div class="project-thumbnail"><img src="{{ asset('storage/resource/images/' . $project->banner )}}" class="card-img-top" alt="..."></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 50, $end='...') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="">
        {{ $projects->onEachSide(5)->links() }}
    </div>
    @if($formVisible || $projectID)
        <livewire:backend.project.create :$projectID/>
    @endif
</div>