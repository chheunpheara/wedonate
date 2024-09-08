<div class="row">
    <div class="fixed-modal-add-project">
        <form action="">
            <div class="col-sm-12 mb-3">
                <label for="project-title">Enter project title</label>
                <input type="text" id="project-title" class="form-control">
            </div>

            <div class="col-sm-12 mb-3">
                <label for="media">Upload project banner</label>
                <input type="file" id="media">
                <small class="text-primary">(.png|.jpeg|.jpg)</small>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="description">Write your project details</label>
                <textarea name="" id="description" rows="10" class="form-control"></textarea>
            </div>

            <div class="col-sm-12 mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="start">Date start</label>
                        <input type="date" id="start" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="due">Date end</label>
                        <input type="date" id="due" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <label for="publish">
                    <input type="checkbox" checked> Publish <small>(Audience will see this project once publish)</small>
                </label>
            </div>

            <div class="col-sm-12 text-end">
                <button type="button" class="btn btn-danger" wire:click.prevent="close()">Close</button>
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>