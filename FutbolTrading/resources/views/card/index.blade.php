@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $viewData['title'] }}</h1>
    <h3>{{ $viewData['subtitle'] }}</h3>

    @if ($viewData['cards']->isEmpty())
        <p>No cards available.</p>
    @else
        <div class="row">
            @foreach ($viewData['cards'] as $card)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('images/' . $card->getImage()) }}" class="card-img-top" alt="{{ $card->getName() }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->getName() }}</h5>
                            <p class="card-text">{{ $card->getDescription() }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($card->getPrice(), 2) }}</p>

                            <div class="d-flex">
                                <a href="{{ route('cards.show', $card->getId()) }}" class="btn btn-primary me-2">
                                    View details
                                </a>

                                <form method="POST" action="{{ route('wishlist.add', $card->getId()) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-heart"></i> Add to Wishlist
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
