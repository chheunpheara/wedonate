<div>
    <small class="creator"><span class="material-icons inline-icon">person</span> {!! Auth::check() && Auth()->user()->id == $project->user->id ? 'Me' : '<a href="/creator/' . App\Models\User::cryptit($project->user->id) . '" wire:navigate>' . $project->user->name . '</a>' !!}</small>
    @if(Auth::check() && Auth()->user()->id != $project->user->id)
        @if(\App\Models\User::isFollowing($project->user->id))
            <button class="btn btn-sm btn-primary btn-follow" wire:click.prevent="unfollow">Following</button>
        @else
            <button class="btn btn-sm btn-primary btn-follow" wire:click.prevent="followCreator">Follow</button>
        @endif
    @endif
</div>