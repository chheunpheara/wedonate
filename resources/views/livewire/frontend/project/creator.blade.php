<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12">
            <livewire:frontend.follow :$project/>
        </div>
    </div>
    <div class="row">
        @foreach($projects as $key => $project)
        <div class="col-sm-3 mb-4 view-inline-project" id="project-{{ $project->id }}" title="{{ $project->title }}" wire:click.prevent="view({{ $project }})">
            <div class="card">
                <div class="project-thumbnail" style="background-image: url({{ asset('storage/resource/images/' . $project->banner) }})"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 80, $end='...') }}</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-bottom-right"><small>{{ $project->total_donator }}</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-sm-12 text-center">
            <button class="btn btn-sm btn-outline-dark" wire:click="more" {{ $total <= $offset ? 'disabled="disabled"' : ''}}><span class="material-icons inline-icon">keyboard_arrow_down</span></button>
        </div>
    </div>
</div>
</div>