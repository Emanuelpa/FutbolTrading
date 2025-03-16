@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row w-100">
    <div class="col">
        <div class="card mb-3 w-100 bg-dark">
            <div class="row g-3">
                <!-- Mayor separación entre imagen e información -->
                <div class="col-md-4">
                    <img src="{{ $viewData['tradeItem']->getImage() }}" class="img-fluid rounded-start"
                        alt="{{ $viewData['tradeItem']->getName() }}" style="width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <div class="card-body bg-dark p-3">
                        <!-- Mayor espacio interno -->
                        <h5 class="card-title text-uppercase fw-bold mb-3">{{ $viewData['tradeItem']->getName() }}</h5>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-filter me-2"></i>
                            {{ __('TradeItem.type') }} {{ $viewData['tradeItem']->getType() }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-user me-2"></i>
                            {{ __('TradeItem.offered_by') }} {{ $viewData['tradeItem']->getUser()->getName() }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            {{ __('TradeItem.in') }} {{ $viewData['tradeItem']->getUser()->getCity() }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-money-bill me-2"></i>
                            {{ __('TradeItem.item_to') }} {{ $viewData['tradeItem']->getOfferType() }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-phone me-2"></i>
                            {{ __('TradeItem.phone') }} {{ $viewData['tradeItem']->getUser()->getPhone() }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            {{ __('TradeItem.description') }} {{ $viewData['tradeItem']->getOfferDescription() }}
                        </p>

                        <p class="card-text fw-lighter mb-3">
                            <small class="text-white">
                                {{ __('TradeItem.published_on') }} {{ $viewData['tradeItem']->getCreatedAt() }}
                            </small>
                        </p>

                        <a href="{{ route('tradeItem.index') }}" class="btn btn-primary active">
                            {{ __('TradeItem.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection