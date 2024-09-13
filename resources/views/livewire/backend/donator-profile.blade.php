<div>
    <div class="fixed-modal-add-project">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="circular_image" style="width: 100px; height: 100px;">
                        @if(isset($user->profilephoto->photo))
                        <img src="{{ asset('storage/resource/images/' . $user->profilephoto->photo) }}" class="card-img-top" alt="{{ $user->name }}">
                        @else
                        <span>{{ ucfirst(substr($user->name, 0, 1)) }}</span>
                        @endif
                    </div>
                    <h5 class="text-center">{{ ucfirst($user->name) }}</h5>
                </div>
                <div class="col-sm-12 mb-3" style="max-height: 600px; overflow: auto">
                    <h5>Activities</h5>
                    <table class="table table-responsive table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Amount donated</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->project->title }}</td>
                                <td>{{ number_format($project->amount, 2) }}</td>
                                <td>{{ date('d/M/Y H:i:s', strtotime($project->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-danger btn-sm" wire:click.prevent="close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>