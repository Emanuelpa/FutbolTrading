<!-- Emanuel Patiño -->
@extends('layouts.app')
@section('title', __('TradeProduct.tradeProduct'))
@section('subtitle', __('TradeProduct.available'))

@section('content')
<div class="container">
    <h1 class="text-white">{{ __('TradeProduct.tradeProduct') }}</h1>
    <h3 class="text-white mb-4">{{ __('TradeProduct.available') }}</h3>

    <form action="{{ route('tradeProduct.filter') }}" method="GET" class="d-flex mb-4">
        <select name="type" class="form-control me-2 text-dark bg-white">
        <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>{{ __('TradeProduct.all') }}</option>
            <option value="card" {{ request('type') == 'card' ? 'selected' : '' }}>{{ __('TradeProduct.card') }}</option>
            <option value="clothes" {{ request('type') == 'clothes' ? 'selected' : '' }}>{{ __('TradeProduct.clothes') }}</option>
            <option value="exclusive" {{ request('type') == 'exclusive' ? 'selected' : '' }}>{{ __('TradeProduct.exclusive') }}</option>
            <option value="signed item" {{ request('type') == 'signed item' ? 'selected' : '' }}>{{ __('TradeProduct.signed') }}</option>
            <option value="virtual item" {{ request('type') == 'virtual item' ? 'selected' : '' }}>{{ __('TradeProduct.virtual') }}</option>
        </select>
        <button type="submit" class="btn btn-primary">{{ __('TradeProduct.filter') }}</button>
    </form>

    @if ($viewData['tradeProducts'] && count($viewData['tradeProducts']) > 0)
    <div class="row">
        @foreach ($viewData['tradeProducts'] as $tradeProduct)
        <div class="col-md-4">
            <div class="card mb-4 bg-dark text-white">
                <img src="{{ asset('storage/' . $tradeProduct->image) }}" class="img-fluid rounded-top"
                    alt="{{ $tradeProduct->getName() }}" style="width: 100%; height: auto;">
                <div class="card-body bg-dark">
                    <h5 class="card-title text-uppercase fw-bold">{{ $tradeProduct->getName() }}</h5>
                    <p class="card-text"><i class="fa-solid fa-filter"></i> {{ $tradeProduct->getType() }}</p>
                    <p class="card-text"><i class="fa-solid fa-money-bill"></i> {{ $tradeProduct->getOfferType() }}</p>
                    <p class="card-text"><small>{{ __('TradeProduct.published_on') }} {{ $tradeProduct->getCreatedAt() }}</small></p>
                    <a href="{{ route('tradeProduct.show', ['id' => $tradeProduct->getId()]) }}" class="btn btn-primary mt-2">
                        <i class="fa-solid fa-eye"></i> {{ __('TradeProduct.view_details') }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-white">{{ __('TradeProduct.no_product') }}</p>
    @endif
</div>
@endsection
