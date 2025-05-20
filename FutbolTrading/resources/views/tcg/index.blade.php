@extends('layouts.app')
@section('title', __('Tcg.title'))

@section('content')
  <div class="container">
    <h1 class="text-white">{{ __('Tcg.title') }}</h1>
    <h3 class="text-white">{{ __('Tcg.subtitle') }}</h3>

    @if (empty($viewData['products']))
      <p class="text-white">{{ __('Tcg.no_results') }}</p>
    @else
      <div class="row">
        @foreach ($viewData['products'] as $product)
          <div class="col-md-4">
            <div class="card mb-4 bg-dark text-white">
              <div class="card-body">
                <h5 class="card-title text-uppercase fw-bold">
                  {{ $product['name'] ?? '' }}
                </h5>
                <p class="card-text">
                  <strong>{{ __('Tcg.description') }}</strong> {{ $product['description'] ?? '' }}
                </p>
                <p class="card-text">
                  <strong>{{ __('Tcg.price') }}</strong>
                  ${{ number_format($product['price'] ?? 0) }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    <hr class="bg-light">

    <div class="text-white mt-4">
      <p><strong>{{ __('Tcg.store_name') }}:</strong> {{ $viewData['store']['storeName'] ?? 'N/A' }}</p>
      <p><strong>{{ __('Tcg.link') }}:</strong> <a href="{{ $viewData['store']['storeProductsLink'] ?? '#' }}"
          class="text-primary" target="_blank">{{ $viewData['store']['storeProductsLink'] ?? '' }}</a></p>
    </div>
  </div>
@endsection
