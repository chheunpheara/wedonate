<div>
    <div class="search-project-wrapper">
    <div class="row search-project">
        <div class="col-sm-12 mb-3 search-box">
        <div x-data x-init="$refs.keyword.focus()">
        <input type="text" class="form-control" placeholder="Search programs..." autofocus="autofocus" wire:keydown="search" wire:model="keyword" x-ref="keyword">
        </div>
        </div>
        <div class="col-sm-12 search-result">
            <div class="row">
                @foreach($projects as $key => $project)
                <div class="col-sm-6 mb-3 view-inline-project" id="project-{{ $project->id }}" title="{{ $project->title }}" wire:click="viewProject({{ $project->id }})">
                    <div class="card">
                        <div class="project-thumbnail" style="background-image: url({{ asset('storage/resource/images/' . $project->banner) }})"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
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
        <div class="col-sm-12 text-end">
            <button class="btn btn-default btn-sm" wire:click.prevent="close">Close</button>
        </div>
    </div>
    </div>
</div>
@script()
<script>
        $wire.on('single-view', (e) => Livewire.navigate('/project/' + e.id));
    </script>
@endscript