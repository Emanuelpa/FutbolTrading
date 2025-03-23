@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row w-100">
    <h4 class="text-center mb-5">{{ $viewData["subtitle"] }}</h4>
    <form action="{{ route('tradeItem.filter') }}" method="GET" class="d-flex mb-4">
        <select name="type" class="form-control me-2 text-dark bg-white">
            <option value="card" {{ request('type') == 'card' ? 'selected' : '' }}>{{ __('TradeItem.card') }}</option>
            <option value="clothes" {{ request('type') == 'clothes' ? 'selected' : '' }}>{{ __('TradeItem.clothes') }}</option>
            <option value="exclusive" {{ request('type') == 'exclusive' ? 'selected' : '' }}>{{ __('TradeItem.exclusive') }}</option>
            <option value="signed item" {{ request('type') == 'signed item' ? 'selected' : '' }}>{{ __('TradeItem.signed') }}</option>
            <option value="virtual item" {{ request('type') == 'virtual item' ? 'selected' : '' }}>{{ __('TradeItem.virtual') }}</option>
        </select>
        <button type="submit" class="btn btn-primary">{{ __('TradeItem.filter') }}</button>
    </form>
    @foreach ($viewData["tradeItems"] as $tradeItem)
    <div class="col-md-6 col-lg-6 mb-3">
        <div class="card mb-3 w-100 bg-dark">
            <div class="row g-2">
                <div class="col-md-4">
                    <img src="{{ $tradeItem->getImage() }}" class="img-fluid rounded-start"
                        alt="{{ $tradeItem->getName() }}" style="width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <div class="card-body bg-dark">
                        <h5 class="card-title text-uppercase fw-bold">{{ $tradeItem->getName() }}</h5>
                        <p class="card-text text-white"><i class="fa-solid fa-filter"></i> {{ $tradeItem->getType() }}</p>
                        <p class="card-text text-white"><i class="fa-solid fa-user"></i> {{ $tradeItem->getUser()->getName() }}</p>
                        <p class="card-text text-white"><i class="fa-solid fa-money-bill"></i> {{ $tradeItem->getOfferType() }}</p>
                        <p class="card-text fw-lighter"><small class="text-white">{{ __('TradeItem.published_on') }} {{ $tradeItem->getCreatedAt() }}</small></p>
                        <a href="{{ route('tradeItem.show', ['id'=> $tradeItem->getId()]) }}" class="btn btn-primary active">
                            {{ __('TradeItem.see_more') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection