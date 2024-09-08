<div class="row project-detail">
    <div class="col">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="text-primary"><span class="material-icons inline-icon">account_balance</span> Total fund raised: USD 2500.00</h4>
            </div>
            <div class="col-sm-6 text-end text-danger">The project will end on <span class="material-icons inline-icon">calendar_month</span> <strong>{{ $project->due_date }}</strong></div>
        </div>
        <img src="{{ $project->banner }}" class="card-img-top" alt="...">
        <div>
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
        </div>
        <div class="text-end">
            <button class="btn btn-outline-success" wire:click="openForm()"><span class="material-icons inline-icon">volunteer_activism</span> Donate</button>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <h3>Donators</h3>
                <div class="row">
                    @foreach($donators as $donator)
                    @php $donator = (object)$donator @endphp
                    <div class="col col-sm-2 mb-3" title="{{ $donator->name }}">
                        <div class="circular_image">
                            <img src="{{ $donator->profile_photo }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <a href="/donators/123">View all 300+ donators</a>
                </div>
            </div>
            <div class="col-sm-3">
                <h3>Top Donators</h3>
                <div class="container">
                    <div class="row">
                    @foreach($topDonators as $donator)
                    @php $donator = (object)$donator @endphp
                    <div class="col col-sm-2 mb-3" title="{{ $donator->name }}">
                        <div class="top-donator">
                            <img src="{{ $donator->profile_photo }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($formOpened)
        <livewire:frontend.project.donation-form/>
    @endif
</div>