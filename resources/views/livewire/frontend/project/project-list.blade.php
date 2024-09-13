<div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row view-project">
                @foreach($projects as $key => $project)
                <div class="col-sm-4 mb-3 view-inline-project" id="project-{{ $project->id }}" title="{{ $project->title }}" wire:click="viewProject({{ $project->id }})">
                    <div class="card">
                        <div class="project-thumbnail" style="background-image: url({{ asset('storage/resource/images/' . $project->banner) }})"></div>
                        <div class="card-body">
                        <h5 class="card-title text-primary">{{ \Illuminate\Support\Str::limit($project->title, 22, $end='...') }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 80, $end='...') }}</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-bottom">
                                        <span class="text-dark creator">{!! Auth::check() && Auth()->user()->id == $project->user->id ? 'Me' : '<a href="/creator/' . App\Models\User::cryptit($project->user->id) . '">' . $project->user->name . '</a>' !!}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
        <div class="col-sm-6">
            @if($viewedProject)
            <livewire:frontend.project.project-detail :$viewedProject :key="$index" />
            @endif
        </div>
    </div>
</div>

@script()
<script>
    $wire.on('more-project-loaded', function(e) {
        const id = '#project-' + e.id;
        setTimeout(() => {
            $('.view-project').animate({scrollTop: $('.view-project').prop('scrollHeight') - $(document).height()}, 'slow');
        }, 500);
    });
</script>
@endscript