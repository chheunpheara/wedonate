<div class="container">
    <h3>These people are our super heroes</h3>
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
</div>