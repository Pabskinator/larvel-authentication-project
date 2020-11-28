@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @forelse($notifications as $notification)
                <li>
                    @if ($notification->type === "App\Notifications\PaymentReceived")
                        We have received a payment of {{ $notification->data['amount'] }} from you.
                    @endif
                </li>
            @empty
                <p>You have no new notifications as of this moment.</p>
            @endforelse
        </ul>
    </div>
@endsection
