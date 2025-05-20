@extends('layouts.app')
@section('title', __('Home.welcome'))
@section('content')
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <h1 class="mb-4">{{ __('Home.welcome') }}</h1>
  <section class="hero">
    <div class="hero-content">
      <h1>{{ __('Home.transform') }}</h1>
      <p>{{ __('Home.transformDescription') }}</p>
      @guest
        <a href="{{ route('login') }}" class="btn btn-primary active">{{ __('Home.login') }}</a>
      @else
        <a href="{{ route('card.index') }}" class="btn btn-primary active">{{ __('Home.shop') }}</a>
      @endguest
    </div>
    <div class="hero-image">
      <img src="{{ asset('images/futbolTraiding.png') }}" alt="Soccer Cards">
    </div>
  </section>

  <section class="featured-cards mb-5">
    <h2 class="section-title mb-4">{{ __('Home.featuredCards') }}</h2>
    <div class="row">
      @foreach ($viewData['cards'] as $card)
        <div class="col-md-4 mb-4">
          <div class="card h-100 bg-dark text-white">
            <img src="{{ asset('storage/' . $card->getImage()) }}" class="card-img-top" alt="{{ $card->getName() }}">
            <div class="card-body">
              <h5 class="card-title text-uppercase fw-bold">{{ $card->getName() }}</h5>
              <div class="product-price">${{ number_format($card->getPrice(), 2) }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center mt-3">
      <a href="{{ route('card.index') }}" class="btn btn-outline-light">{{ __('Home.viewCards') }}</a>
    </div>
  </section>

  <section class="featured-products mb-5">
    <h2 class="section-title mb-4">{{ __('Home.featuredProducts') }}</h2>
    <div class="row">
      @foreach ($viewData['products'] as $product)
        <div class="col-md-4 mb-4">
          <div class="card h-100 bg-dark text-white">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->getName() }}">
            <div class="card-body">
              <h5 class="card-title text-uppercase fw-bold">{{ $product->getName() }}</h5>
              <p class="card-text"><i class="fa-solid fa-filter"></i> {{ $product->getType() }}</p>
              <p class="card-text"><i class="fa-solid fa-money-bill"></i> {{ $product->getOfferType() }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center mt-3">
      <a href="{{ route('tradeProduct.index') }}" class="btn btn-outline-light">{{ __('Home.viewProducts') }}</a>
    </div>
  </section>

  <section class="features">
    <div class="feature">
      <h2>{{ __('Home.authenticCards') }}</h2>
      <p>{{ __('Home.authenticCardsDescription') }}</p>
    </div>
    <div class="feature">
      <h2>{{ __('Home.rareFinds') }}</h2>
      <p>{{ __('Home.rareFindsDescription') }}</p>
    </div>
  </section>
@endsection
