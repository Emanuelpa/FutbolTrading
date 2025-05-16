<!-- MarcelaLondoño -->
@extends('layouts.app')
@section('title', __('Card.title'))
@section('content')
<div class="container">
    <h1 class="text-white">{{ __('Card.title') }}</h1>
    <h3 class="text-white">{{ __('Card.subtitle') }}</h3>

    <form action="{{ route('card.search') }}" method="GET" class="d-flex mb-4">
        <input type="text" name="query" class="form-control text-dark me-2" placeholder="{{ __('Card.search_cards') }}"
            required>
        <button type="submit" class="btn btn-primary">{{ __('Card.search') }}</button>
    </form>

    @if ($viewData['cards']->isEmpty())
    <p class="text-white">{{ __('Card.no_results') }}</p>
    @else
    <div class="row">
        @foreach ($viewData['cards'] as $card)
        <div class="col-md-4">
            <div class="card mb-4 bg-dark text-white">
                <img src="{{ asset('storage/' . $card->getImage()) }}" class="img-fluid rounded-top"
                    alt="{{ $card->getName() }}" style="width: 100%; height: auto;">
                <div class="card-body bg-dark">
                    <h5 class="card-title text-uppercase fw-bold">{{ $card->getName() }}</h5>
                    <p class="card-text">{{ __('Card.description_index') }} {{ $card->getDescription() }}</p>
                    <p class="card-text"><strong>{{ __('Card.price_index') }}</strong>
                        ${{ number_format($card->getPrice(), 2) }}</p>
                    <div class="d-flex">
                        <a href="{{ route('card.show', $card->getId()) }}" class="btn btn-primary me-2">
                            <i class="fa-solid fa-eye"></i> {{ __('Card.details') }}
                        </a>
                        <form method="POST" action="{{ route('wishlist.add', $card->getId()) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-heart"></i> {{ __('Card.wishlist') }}
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