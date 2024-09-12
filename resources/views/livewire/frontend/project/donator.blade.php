<div class="container">
    <h3>These people are our super heroes</h3>
    <div class="row mb-3">
        @foreach($donators as $donator)
        @php $donator = (object)$donator @endphp
        <div class="col col-sm-2 mb-3" title="{{ $donator->name }}">
            <div class="circular_image">
                @if(isset($donator->user->profilephoto->photo))
                <img src="{{ asset('storage/resource/images/' . $donator->user->profilephoto->photo) }}" class="card-img-top" alt="...">
                @else
                <span>{{ ucfirst(substr($donator->user->name, 0, 1)) }}</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="container">{{ $donators->onEachSide(5)->links() }}</div>
    </div>
</div>