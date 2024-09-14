<div class="row">
    <div class="fixed-modal-right">
        <form wire:submit="start">
            <h3>We Donate</h3>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h6>Fill in the form</h6>
            <div class="col-sm-12 mb-3">
                <input type="number" min="1" placeholder="How much do you want to donate?" class="form-control" wire:model="amount">
                @error('amount') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-sm-12 mb-3">
                <textarea name="" id="" class="form-control" rows="2" placeholder="Your optional personal statement " wire:model="statement"></textarea>
            </div>

            <div class="col-sm-12 mb-2">
                <label for="my-profile">
                    <input type="checkbox" id="my-profile" wire:model="showProfile"> Show my profile
                </label>
            </div>

            <div class="col-sm-12 mb-5">
                <label for="to-follow">
                    <input type="checkbox" id="to-follow" wire:model="follow"> Follow the creator for the future updates
                </label>
            </div>

            <div class="col-sm-12 text-end">
                <button type="button" class="btn btn-danger" wire:click.prevent="close()">Close</button>
                <button class="btn btn-primary" type="button" wire:click="start">Click to start your donation</button>
            </div>

            @if($submitted)
            <div class="qr mb-3">
                <div class="inner">
                    <img src="{{ $qr }}" alt="">
                </div>
            </div>
            <div class="text-center">
                <h6>Scan QR to donate</h6>
            </div>
            @endif
        </form>
    </div>
</div>