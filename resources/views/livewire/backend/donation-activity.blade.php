<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h3>My Activities</h3>
                @foreach($projects as $project)
                <div class="row">
                    <div class="col-sm-12 mb-2">
                        [{{ date('d-M-Y H:i:s', strtotime($project->created_at)) }}]: <strong>${{ number_format($project->amount, 2) }}</strong> was paid to <a href="{{ url('/project/' . \App\Models\User::cryptit($project->project_id)) }}" target="_blank">{{ $project->project->title }}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-sm-6 text-center">
                <h3>Total Donated Amount: <span class="text-primary">{{ number_format($spent, 2) }}</span></h3>
                <livewire:backend.donation-activity-chart />
            </div>
            <div class="col-sm-12 text-center">
                <button class="btn btn-sm btn-outline-dark" wire:click="more" {{ $total <= $limit ? 'disabled="disabled"' : ''}}><span class="material-icons inline-icon">keyboard_arrow_down</span></button>
            </div>
        </div>
    </div>
</div>