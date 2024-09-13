<div>
    <div class="row">
        <h4>My Programs</h4>
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
                <div class="project-thumbnail" style="background-image: url({{ asset('storage/resource/images/' . $project->banner) }})"></div>
                <div class="card-body">
                    <h6 class="card-title text-primary">{{ \Illuminate\Support\Str::limit($project->title, 22, $end='...') }}</h6>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 80, $end='...') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="">
        {{ $projects->onEachSide(5)->links() }}
    </div>
    @if($formVisible)
    <livewire:backend.project.create key="{{ now() }}" />
    @endif

    @if($projectID)
    <livewire:backend.project.create :$projectID key="{{ now() }}" />
    @endif
</div>