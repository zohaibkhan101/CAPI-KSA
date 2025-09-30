@extends('layouts.nav')

@section('content')
<div class="container" style="padding:50px;">
    <h1 class="text-center">Business Cards</h1>
    <div class="cards-list" style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center; margin-top:40px;">
        @foreach($cards as $card)
            <div class="card" style="padding:20px; border:1px solid #ccc; border-radius:12px; width:250px; text-align:center;">
                <h3>{{ $card->name }}</h3>
                <p>{{ $card->position }}</p>
                <p>{{ $card->company }}</p>
                <a href="{{ route('business-card.show', $card->id) }}" class="btn btn-primary">View Card</a>
                <a href="{{ route('business-card.vcard', $card->id) }}" class="btn btn-secondary" style="margin-top:5px;">Save Contact</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
