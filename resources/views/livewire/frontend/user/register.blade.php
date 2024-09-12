<div class="row">
    <div class="fixed-modal-right">
        <form wire:submit="register">

            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-sm-12 mb-3">
                <label for="name">Enter your fullname<span class="text-danger">*</span></label>
                <input type="text" id="name" class="form-control" wire:model="name">
                <small>@error('name') <span class="text-danger">{{ $message }}</span> @enderror</small>
            </div>
            <div class="col-sm-12 mb-3">
                <label for="email">Enter email address<span class="text-danger">*</span></label>
                <input type="email" id="email" class="form-control" wire:model="email">
                <small>@error('email') <span class="text-danger">{{ $message }}</span> @enderror</small>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="password">Enter password<span class="text-danger">*</span></label>
                <input type="password" id="password" class="form-control" wire:model="password">
                <small>@error('password') <span class="text-danger">{{ $message }}</span> @enderror</small>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="confirm-password">Confirm password<span class="text-danger">*</span></label>
                <input type="password" id="confirm-password" class="form-control" wire:model="password_confirmation">
                <small>@error('password') <span class="text-danger">{{ $message }}</span> @enderror</small>
            </div>

            <div class="col-sm-12 mb-3">
                Already have an account? <a href="javascript:void();" wire:click.prevent="openLogin">Login</a>
            </div>

            <div class="col-sm-12 text-end">
                <button type="button" class="btn btn-danger" wire:click.prevent="close()">Close</button>
                <button class="btn btn-primary" type="submit">Sign up</button>
            </div>
        </form>
    </div>
</div>