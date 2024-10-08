<div class="row">
    <div class="fixed-modal-right">
        <form wire:submit="authenticate">
        <h3>We Donate</h3>
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-sm-12 mb-3">
                <label for="email">Enter email address<span class="text-danger">*</span></label>
                <input type="email" id="email" class="form-control" wire:model="user">
                <small>@error('user') <span class="text-danger">{{ $message }}</span> @enderror</small>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="password">Enter password<span class="text-danger">*</span></label>
                <input type="password" id="password" class="form-control" wire:model="password">
                <small>@error('password') <span class="text-danger">{{ $message }}</span> @enderror</small>
            </div>

            <div class="col-sm-12 mb-3">
                Create a new account? <a href="javascript:void();" wire:click.prevent="openRegister">Register</a>
            </div>

            <div class="col-sm-12 text-end">
                <button type="button" class="btn btn-danger" wire:click.prevent="close()">Close</button>
                <button class="btn btn-primary" type="submit">Sign in</button>
            </div>
        </form>
    </div>
</div>
@script()
    <script>
        $wire.on('login-success', () => Livewire.navigate('/'))
    </script>
@endscript