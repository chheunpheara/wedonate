<div class="row">
    <div class="fixed-modal-right">
        <form action="">
            <h6>Choose a bank</h6>
            <div class="col-sm-12 mb-3">
                <select name="" id="" class="form-control">
                    <option value="">Bank</option>
                </select>
            </div>

            <div class="col-sm-12 mb-3">
                <input type="number" min="1" placeholder="How much do you want to donate?" class="form-control">
            </div>

            <div class="col-sm-12 mb-3">
                <input type="text" class="form-control" placeholder="Enter your name">
            </div>

            <div class="col-sm-12 mb-3">
                <textarea name="" id="" class="form-control" rows="2" placeholder="Your optional personal statement "></textarea>
            </div>

            <div class="col-sm-12 mb-2">
                <label for="my-profile">
                    <input type="checkbox" id="my-profile"> Show my profile
                </label>
            </div>

            <div class="col-sm-12 mb-5">
                <label for="to-follow">
                    <input type="checkbox" id="to-follow"> Follow the creator for the future updates
                </label>
            </div>

            <div class="col-sm-12 text-end">
                <button type="button" class="btn btn-danger" wire:click.prevent="close()">Close</button>
                <button class="btn btn-primary">Click to start your donation</button>
            </div>
        </form>
    </div>
</div>