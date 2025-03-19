@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $viewData['title'] }}</h1>
    <h3>{{ $viewData['subtitle'] }}</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($viewData['cards']->isEmpty())
        <p>There are no cards in your wishlist.</p>
    @else
        <div class="row">
            @foreach ($viewData['cards'] as $wishlist)
                @foreach ($wishlist->getCards() as $card)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('images/' . $card->getImage()) }}" class="card-img-top" alt="{{ $card->getName() }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->getName() }}</h5>
                                <p class="card-text">{{ $card->getDescription() }}</p>
                                <p class="card-text"><strong>Price:</strong> ${{ number_format($card->getPrice(), 2) }}</p>
                                <a href="{{ route('cards.show', $card->getId()) }}" class="btn btn-primary">View details</a>
                                <form action="{{ route('wishlist.remove', $card->getId()) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove from Wishlist</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif
</div>
@endsection
