@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

  <div class="row w-100">
    <h4 class="text-center mb-5">{{ $viewData['subtitle'] }}</h4>
    <form action="{{ route('tradeProduct.filter') }}" method="GET" class="d-flex mb-4">
      <select name="type" class="form-control me-2 text-dark bg-white">
        <option value="card" {{ request('type') == 'card' ? 'selected' : '' }}>{{ __('TradeProduct.card') }}
        </option>
        <option value="clothes" {{ request('type') == 'clothes' ? 'selected' : '' }}>
          {{ __('TradeProduct.clothes') }}
        </option>
        <option value="exclusive" {{ request('type') == 'exclusive' ? 'selected' : '' }}>
          {{ __('TradeProduct.exclusive') }}
        </option>
        <option value="signed item" {{ request('type') == 'signed item' ? 'selected' : '' }}>
          {{ __('TradeProduct.signed') }}
        </option>
        <option value="virtual item" {{ request('type') == 'virtual item' ? 'selected' : '' }}>
          {{ __('TradeProduct.virtual') }}
        </option>
      </select>
      <button type="submit" class="btn btn-primary">{{ __('TradeProduct.filter') }}</button>
    </form>
    @if ($viewData['tradeProducts'])
      @foreach ($viewData['tradeProducts'] as $tradeProduct)
        <div class="col-md-6 col-lg-6 mb-3">
          <div class="card mb-3 w-100 bg-dark h-100" style="min-height: 250px;">
            <div class="row g-0 h-100">
              <div class="col-md-4">
                <img src="{{ asset('storage/' . $tradeProduct->image) }}"
                  class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $tradeProduct->getName() }}">
              </div>
              <div class="col-md-8 d-flex flex-column">
                <div class="card-body bg-dark flex-grow-1">
                  <h5 class="card-title text-uppercase fw-bold">{{ $tradeProduct->getName() }}</h5>
                  <p class="card-text text-white"><i class="fa-solid fa-filter"></i>
                    {{ $tradeProduct->getType() }}
                  </p>
                  <p class="card-text text-white"><i class="fa-solid fa-money-bill"></i>
                    {{ $tradeProduct->getOfferType() }}
                  </p>
                  <p class="card-text fw-lighter"><small class="text-white">
                      {{ __('TradeProduct.published_on') }} {{ $tradeProduct->getCreatedAt() }}
                    </small></p>
                </div>
                <div class="d-flex gap-2 p-3">
                  <a href="{{ route('tradeProduct.show', ['id' => $tradeProduct->getId()]) }}"
                    class="btn btn-primary active"><i class="fa-solid fa-eye"></i>
                    {{ __('TradeProduct.see_more') }}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <p>{{ __('TradeProduct.no_product') }}</p>
    @endif
  </div>

@endsection
