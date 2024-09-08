<div class="row">
    <div class="col-sm-3">
        <div class="row row-cols-1 row-cols-md-1 g-4 view-project">
            @foreach($projects as $key => $project)
            @php $project = (object)$project @endphp
            <div class="col view-inline-project" id="project-{{ $key }}" title="{{ $project->title }}" wire:click="viewProject({{ $key }})">
                <div class="card">
                    <img src="{{ $project->banner }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 150, $end='...') }}</p>
                        <div class="text-center">
                            <button class="btn btn-outline-success" wire:click="openForm()"><span class="material-icons inline-icon">volunteer_activism</span> Become our super hero</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-9">
        @if($viewedProject)
        <livewire:frontend.project.project-detail :$viewedProject :key="$index" />
        @endif
    </div>
</div>