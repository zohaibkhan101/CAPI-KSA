@extends('layouts.nav')

@section('content')
<div class="container" style="padding:50px;">
    <h1 class="text-center">All QR Codes</h1>

    <div class="qr-grid" style="display:flex; flex-wrap:wrap; gap:40px; justify-content:center; margin-top:40px;">
        @foreach($cards as $card)
            <div class="qr-card" style="text-align:center; padding:20px; border:1px solid #ccc; border-radius:12px; width:220px;">
                <h3>{{ $card->name }}</h3>
                <p>{{ $card->position }}</p>
                <div class="qr-code" style="margin: 15px 0;">
                    {!! $card->qr !!}
                </div>
                <a href="{{ route('business-card.show', $card->id) }}" class="btn btn-primary" style="margin-top:5px;">View Card</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
