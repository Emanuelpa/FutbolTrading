@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

  <div class="row justify-content-center w-100 d-flex align-items-center">
    <div class="col-lg-12 col-md-12">
      <div class="card bg-dark text-light shadow-lg border-0 my-5 min-vh-95">
        <div class="row g-0 h-100 align-items-stretch">
          <div class="col-md-4 d-flex align-items-stretch">
            <img src="{{ asset('storage/' . $viewData['tradeProduct']->getImage()) }}"
              class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $viewData['tradeProduct']->getName() }}">
          </div>
          <div class="col-md-8 d-flex flex-column">
            <div class="card-body p-4">
              <h4 class="card-title text-uppercase fw-bold mb-3">
                {{ $viewData['tradeProduct']->getName() }}
              </h4>
              <ul class="list-unstyled flex-grow-1 mb-5 fs-5">
                <li class="mb-3">
                  <i class="fa-solid fa-filter me-2 text-white"></i>
                  <strong>{{ __('TradeProduct.type') }}:</strong>
                  {{ $viewData['tradeProduct']->getType() }}
                </li>
                <li class="mb-3">
                  <i class="fa-solid fa-user me-2 text-white"></i>
                  <strong>{{ __('TradeProduct.offered_by') }}</strong>
                  {{ $viewData['tradeProduct']->getUser()->getName() }}
                </li>
                <li class="mb-3">
                  <i class="fa-solid fa-location-dot me-2 text-white"></i>
                  <strong>{{ __('TradeProduct.in') }}</strong>
                  {{ $viewData['tradeProduct']->getUser()->getCity() }}
                </li>
                <li class="mb-3">
                  <i class="fa-solid fa-money-bill me-2 text-white"></i>
                  <strong>{{ __('TradeProduct.product_to') }}:</strong>
                  {{ $viewData['tradeProduct']->getOfferType() }}
                </li>
                <li class="mb-3">
                  <i class="fa-solid fa-phone me-2 text-white"></i>
                  <strong>{{ __('TradeProduct.phone') }}:</strong>
                  {{ $viewData['tradeProduct']->getUser()->getPhone() }}
                </li>
                <li class="mb-3">
                  <i class="fa-solid fa-circle-info me-2 text-white"></i>
                  <strong>{{ __('TradeProduct.description') }}:</strong>
                  {{ $viewData['tradeProduct']->getOfferDescription() }}
                </li>
              </ul>
              <p class="text-white small mb-3">
                <i class="fa-solid fa-calendar-alt me-2"></i>{{ __('TradeProduct.published_on') }}
                {{ $viewData['tradeProduct']->getCreatedAt() }}
              </p>

              <p class="text-white small mb-3">
                <i class="fa-solid fa-arrows-rotate"></i>
                {{ __('TradeProduct.last_update') }}{{ $viewData['tradeProduct']->getUpdatedAt() }}
              </p>

              <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-2"></i> {{ __('TradeProduct.back') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
