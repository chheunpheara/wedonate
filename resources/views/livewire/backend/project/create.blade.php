<div class="row">
    <div class="fixed-modal-add-project" @if($donator> 0) style="width: 70%" @endif>
        <div class="row">
            @if($donator > 0)
            <div class="col-sm-6">
                <div class="col-sm-12 mb-5">
                    <embed src="/dummy-chart/{{ \App\Models\User::cryptit($project->id) }}" width="100%" height="300" />
                </div>
                <hr>
                <div class="row">
                    <h6>Supporters</h6>
                    @foreach($project->donators as $person)
                    <div class="col col-sm-2 mb-3" title="{{ $person->name }}">
                        <div class="circular_image" style="cursor:pointer" wire:click.prevent="viewProfile({{ $person->user->id }})">
                            @if(isset($person->user->profilephoto->photo))
                            <img src="{{ asset('storage/resource/images/' . $person->user->profilephoto->photo) }}" class="card-img-top" alt="{{ $person->user->name }}" title="{{ $person->user->name }}">
                            @else
                            <span>{{ ucfirst(substr($person->user->name, 0, 1)) }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="{{ $donator > 0 ? 'col-sm-6' : 'col-sm-12'}}">
                <form wire:submit.prevent="save">
                    <div class="col-sm-12 mb-3">
                        <label for="project-title">Enter project title<span class="text-danger">*</span></label>
                        <input type="text" id="project-title" class="form-control" wire:model="title">
                        @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="media">Upload project banner <span class="text-danger">*</span></label>
                        <input type="file" wire:model="banner" id="media" class="form-control">
                        @error('banner') <span class="error text-danger">{{ $message }}</span> @enderror
                        <small class="text-primary">(.png|.jpeg|.jpg)</small>
                        @if($preview)
                        <div>
                            <img src="{{ asset('storage/resource/images/' . $preview) }}" alt="" height="200">
                        </div>
                        @endif
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="description">Write your project details</label>
                        <textarea name="" id="description" rows="10" class="form-control" wire:model="description"></textarea>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="start">Date start<span class="text-danger">*</span></label>
                                <input type="date" id="start" class="form-control" wire:model="startDate">
                                @error('startDate') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="due">Date end<span class="text-danger">*</span></label>
                                <input type="date" id="due" class="form-control" wire:model="dueDate">
                                @error('dueDate') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="publish">
                            <input type="checkbox" id="publish" wire:model="published" @if($published) checked='checked' @endif> Publish <small>(Audience will see this project once publish)</small>
                        </label>
                    </div>

                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-danger" wire:click.prevent="close()">Close</button>
                        <button class="btn btn-primary" type="submit">{{ $projectID ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($openProfileForm)
        <livewire:backend.donator-profile :$profileId :$creator :key="$profileId"/>
    @endif
</div>