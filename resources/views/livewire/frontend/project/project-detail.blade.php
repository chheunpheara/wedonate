<div class="row project-detail">
    <div class="col">
        <div class="row">
            <div class="col-sm-6">
                <!--<h4 class="text-primary"><span class="material-icons inline-icon">account_balance</span> Total fund raised: USD 2500.00</h4>-->
            </div>

        </div>
        <div class="detail-thumbnail-wrapper">
            <div class="detail-thumbnail">
                <img src="{{ asset('storage/resource/images/' . $project->banner) }}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-danger">
                <div>The project will end on <span class="material-icons inline-icon">calendar_month</span> <strong>{{ $project->due_date }}</strong></div>
                @if($project->total_donator)
                <div><span class="material-icons inline-icon text-dark">campaign</span><small class="text-primary">{{ $project->total_donator }}</small></div>
                @endif
                <div class="text-dark">
                    <livewire:frontend.follow :$project/>
                </div>
            </div>
            <div class="col-sm-6 text-end">
                @if(!Auth::check() || $project->user_id != Auth()->user()->id)
                <button class="btn btn-outline-success btn-sm" wire:click="openForm()"><span class="material-icons inline-icon">volunteer_activism</span> Show your support</button>
                @endif
            </div>
        </div>
        <div class="detail-description mb-5">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
        </div>
        
        @if(!$project->donators->isEmpty())
        <div class="col-sm-12 mb-5">
            <embed src="/dummy-chart/{{ \App\Models\User::cryptit($project->id) }}" width="100%" height="300"/>
        </div>
        @endif

        @if(!$donators->isEmpty())
        <div class="row">
            @if(!$topDonators->isEmpty())
            <div class="col-sm-12 mb-5">
                <h6>Top Supporters</h6>
                <div class="container">
                    <div class="row">
                        @foreach($topDonators as $donator)
                        @php $donator = (object)$donator @endphp
                        <div class="col col-sm-2 mb-3" title="{{ $donator->name }}">
                            <div class="top-donator">
                                <img src="{{ asset('storage/resource/images/' . $donator->user->profilephoto->photo) }}" class="card-img-top" alt="...">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="col-sm-12">
                <h6>Supporters</h6>
                <div class="row">
                    @foreach($donators as $donator)
                    @php $donator = (object)$donator @endphp
                    <div class="col col-sm-1 mb-3" title="{{ $donator->name }}">
                        <div class="circular_image">
                            @if(isset($donator->user->profilephoto->photo))
                            <img src="{{ asset('storage/resource/images/' . $donator->user->profilephoto->photo) }}" class="card-img-top" alt="...">
                            @else
                            <span>{{ ucfirst(substr($donator->user->name, 0, 1)) }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($totalDonator > $limit)
                <div class="row">
                    <a href="{{ url('/donators/' . $projectID) }}">View all {{ $totalDonator }}+ supporters</a>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>

    @if($formOpened)

    @if(Auth::check())
    <livewire:frontend.project.donation-form :$projectID />
    @else
    <livewire:frontend.user.login />
    @endif
    @endif
</div>