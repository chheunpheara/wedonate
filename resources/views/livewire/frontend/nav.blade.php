<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span class="material-icons text-success">volunteer_activism</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/" wire:navigate><span class="material-icons inline-icon">home</span> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" wire:navigate><span class="material-icons inline-icon">trending_up</span> Trends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/helps') }}" wire:navigate><span class="material-icons inline-icon">help</span> Help Center</a>
                    </li>
                </ul>

                @if(Auth::check())
                <ul class="navbar-nav">
                    <li>
                        <input type="text" class="form-control" placeholder="Search programs" wire:click.prevent="search" readonly>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(isset(Auth()->user()->profilephoto->photo))
                            <span class="avatar"><img src="{{ asset('storage/resource/images/' . Auth()->user()->profilephoto->photo) }}" alt=""></span>
                            @else
                            {{ ucfirst(Auth()->user()->name) }}
                            @endif
                        </a>
                        <ul class="dropdown-menu" style="margin-left: -120px;">
                            <li><a class="dropdown-item" href="/projects" wire:navigate><span class="material-icons inline-icon">campaign</span> Programs</a></li>
                            <li>
                                <a href="{{ url('/activities') }}" class="dropdown-item" wire:navigate>
                                    <span class="material-icons inline-icon">celebration</span> Donation Activities
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="/account-settings" wire:navigate><span class="material-icons inline-icon">settings</span> Account Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" wire:click="logout" wire.navigate><span class="material-icons inline-icon">logout</span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav">
                    <li>
                        <input type="text" class="form-control" placeholder="Search programs" wire:click.prevent="search" readonly>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" wire:click="openLogin()"><span class="material-icons inline-icon text-warning">person</span> Sign in</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
    @if($formOpened)
    <livewire:frontend.user.login />
    @endif
    @if($registerRequested)
    <livewire:frontend.user.register />
    @endif
    @if($searchClicked)
    <livewire:frontend.search-project />
    @endif
</div>
@script()
    <script>
        if (typeof(EventSource) !== 'undefined') {
            // const source = new EventSource('/events/sse');
            // source.onmessage = function (event) {
            //     const data = JSON.parse(event.data);
            //     console.log(data);
            // }
        }
    </script>
    <script>
        $wire.on('logout-success', () => Livewire.navigate('/'));
    </script>
@endscript