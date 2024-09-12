<div>
    <div class="row mb-5">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-default text-dark">Account Information</div>
                <div class="card-body bg-light">
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    @if($avatar)
                                    <div class="circular_image"><img src="{{ asset('storage/resource/images/' . $avatar) }}" alt=""></div>
                                    @else
                                    <span class="material-icons text-secondary" style="font-size: 5em">photo</span>
                                    @endif
                                </div>
                                <div class="col-sm-8">
                                Change profile photo <input type="file" wire:model="profilephoto" class="form-control">
                                @error('profilephoto') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            @if($nameEditRequested)
                            <input type="text" class="form-control" wire:model="name" wire:blur="updateName()" wire:keydown.enter="updateName()">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            @else
                            <p wire:click.prevent="editName()">{{ $name }}</p>
                            @endif
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <span class="material-icons inline-icon">email</span> {{ $email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-default text-dark">
                    <div class="row">
                        <div class="col-sm-6">Credential</div>
                        <div class="col-sm-6 text-end">
                            <button type="button" class="btn btn-sm btn-light" wire:click.prevent="updatePassword()"><span class="material-icons inline-icon">check</span></button>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="password">New password<span class="text-danger">*</span></label>
                            <input type="password" id="password" class="form-control" wire:model="password">
                            @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="re-password">Retype new password<span class="text-danger">*</span></label>
                            <input type="password" id="re-password" class="form-control" wire:model="password_confirmation">
                            @error('repassword') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>