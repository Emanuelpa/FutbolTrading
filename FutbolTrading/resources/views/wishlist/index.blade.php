@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="text-white">{{ $viewData['title'] }}</h1>
  <h3 class="text-white">{{ $viewData['subtitle'] }}</h3>

  @if ($viewData['cards']->isEmpty())
    <p class="text-white">{{ __('wishlist.no_cards') }}</p>
  @else
    <div class="row">
      @foreach ($viewData['cards'] as $card)
        <div class="col-md-4">
          <div class="card mb-4 bg-dark text-white">
            <img src="{{ asset('storage/' . $card->getImage()) }}"
              class="img-fluid rounded-top"
              alt="{{ $card->getName() }}"
              style="width: 100%; height: auto;">

            <div class="card-body bg-dark">
              <h5 class="card-title text-uppercase fw-bold">{{ $card->getName() }}</h5>
              <p class="card-text"><i class="fa-solid fa-circle-info me-2"></i> {{ $card->getDescription() }}</p>
              <p class="card-text"><i class="fa-solid fa-money-bill me-2"></i> <strong>{{ __('wishlist.price') }}</strong> ${{ number_format($card->getPrice(), 2) }}</p>

              <form method="POST" action="{{ route('wishlist.remove', $card->getId()) }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i> {{ __('wishlist.remove') }}
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
