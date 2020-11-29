@foreach ($conversation->replies as $reply)
    <div>
        <header class="d-flex justify-content-between">
            <p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>

            @if($reply->isBest())
                <span class="text-success text-capitalize">best reply!</span>
            @endif
        </header>

        {{$reply->body}}

        @can('update', $conversation)
            <form method="POST" action="/best-replies/{{ $reply->id }}">
                @csrf

                <button
                    type="submit"
                    class="btn p-0 text-muted">
                    Best Reply?
                </button>
            </form>
        @endcan
    </div>

    @continue($loop->last)
    <hr>
@endforeach
