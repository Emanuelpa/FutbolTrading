<!-- Emanuel Patiño -->
@extends('layouts.app')
@section('title', __('userTradeProduct.your_products'))

@section('content')
  <div class="container">
    <h1 class="text-white">{{ __('userTradeProduct.your_products') }}</h1>

    <div class="container d-flex justify-content-center mb-4">
      <a href="{{ route('tradeProduct.create') }}" class="btn btn-primary">
        {{ __('userTradeProduct.create') }}
      </a>
    </div>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    @if ($viewData['userTradeProducts'] && count($viewData['userTradeProducts']) > 0)
      <div class="row">
        @foreach ($viewData['userTradeProducts'] as $product)
          <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white h-100">
              <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-top"
                alt="{{ $product->getName() }}" style="width: 100%; height: auto;">
              <div class="card-body bg-dark">
                <h5 class="card-title text-uppercase fw-bold">{{ $product->getName() }}</h5>
                <p class="card-text"><i class="fa-solid fa-filter"></i> {{ $product->getType() }}</p>
                <p class="card-text"><i class="fa-solid fa-tag"></i> {{ $product->getOfferType() }}</p>
                <p class="card-text">
                  <small><i class="fa-solid fa-calendar"></i> {{ __('userTradeProduct.published_on') }}
                    {{ $product->getCreatedAt() }}</small>
                </p>
                <div class="d-flex">
                  <a href="{{ route('tradeProduct.show', ['id' => $product->getId()]) }}" class="btn btn-primary me-2">
                    <i class="fa-solid fa-eye"></i> {{ __('userTradeProduct.view_details') }}
                  </a>
                  <form action="{{ route('tradeProduct.delete', $product->getId()) }}" method="POST" @method('DELETE')
                    <button class="btn btn-success">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="text-white text-center">
        <p>{{ __('userTradeProduct.no_products') }}</p>
        <p>{{ __('userTradeProduct.you_dont') }}</p>
      </div>
    @endif
  </div>
@endsection
