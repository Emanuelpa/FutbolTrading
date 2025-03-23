@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row w-100">
  <div class="col">
    <div class="card mb-3 w-100 bg-dark">
      <div class="row g-3">
        <div class="col-md-4">
          <img src="{{ asset('storage/' . $viewData['card']->getImage()) }}" class="img-fluid rounded-start"
            alt="{{ $viewData['card']->getName() }}" style="width: 100%; height: auto;">
        </div>
        <div class="col-md-8">
          <div class="card-body bg-dark p-3">
            <h5 class="card-title text-uppercase fw-bold mb-3">{{ $viewData['card']->getName() }}</h5>
            <p class="card-text text-white mb-3">
              <i class="fa-solid fa-circle-info me-2"></i>
              {{ __('card.description_index') }} {{ $viewData['card']->getDescription() ?? __('card.nodescription') }}
            </p>
            <p class="card-text text-white mb-3">
              <i class="fa-solid fa-money-bill me-2"></i>
              {{ __('card.price_index') }} ${{ number_format($viewData['card']->getPrice(), 2) }}
            </p>
            <p class="card-text text-white mb-3">
              <i class="fa-solid fa-box me-2"></i>
              {{ __('card.quantity_index') }} {{ $viewData['card']->getQuantity() }}
            </p>
            <p class="card-text fw-lighter mb-3">
              <small class="text-white">
                {{ __('card.published') }} {{ $viewData['card']->getCreatedAt() }}
              </small>
            </p>
            <form method="POST" action="{{ route('cart.add', ['id' => $viewData['card']->getId()]) }}" class="mt-3">
              @csrf
              <div class="input-group" style="max-width: 200px;">
                <span class="input-group-text bg-secondary text-white">
                  <i class="fa-solid fa-cart-plus"></i>
                </span>
                <input type="number" name="quantity" value="1" min="1"
                  max="{{ $viewData['card']->getQuantity() }}" class="form-control text-center" required>
                <button type="submit" class="btn btn-success">
                  {{ __('card.add_cart') }}
                </button>
              </div>
            </form>
            <div class="d-flex mt-4">
              <a href="{{ url()->previous() }}" class="btn btn-primary me-2">
                {{ __('card.back') }}
              </a>
              <form method="POST" action="{{ route('wishlist.add', $viewData['card']->getId()) }}">
                @csrf
                <button type="submit" class="btn btn-success">
                  <i class="fa-solid fa-heart"></i> {{ __('card.wishlist') }}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection