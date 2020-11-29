@foreach ($conversation->replies as $reply)
    <div>
        <p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>

        {{$reply->body}}

        <form action="">
            <button class="btn p-0 text-muted">Best Reply?</button>
        </form>
    </div>

    @continue($loop->last)
    <hr>
@endforeach
