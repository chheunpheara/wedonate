<div>
    <div class="row">
        <h4>My Projects</h4>
        <div class="col-sm-12 mb-3">
            <div class="add-new-project" wire:click="openFormAdd()">
                <span class="material-icons">add</span>
            </div>
        </div>
        @foreach($projects as $key => $project)
        @php $project = (object)$project @endphp
        <div class="col-sm-2 view-inline-project" id="project-{{ $key }}" title="{{ $project->title }}">
            <div class="card">
                <div class="project-thumbnail"><img src="{{ $project->banner }}" class="card-img-top" alt="..."></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 50, $end='...') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($formVisible)
        <livewire:frontend.project.create/>
    @endif
</div>