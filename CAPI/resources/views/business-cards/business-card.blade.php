@extends('layouts.nav')

@section('content')
<div class="container text-center" style="padding:50px;">
    <h1>{{ $card->name }}</h1>
    <h3>{{ $card->position }}</h3>
    <p>Email: <a href="mailto:{{ $card->email }}">{{ $card->email }}</a></p>
    <p>Phone: <a href="tel:{{ $card->phone }}">{{ $card->phone }}</a></p>
    <p>Company: {{ $card->company }}</p>
    <p>Website: <a href="{{ $card->website }}" target="_blank">{{ $card->website }}</a></p>
    <a href="{{ route('business-card.vcard', $card->id) }}" class="btn btn-primary" style="margin-top:20px;">Save Contact</a>
</div>
@endsection
