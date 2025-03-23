@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row w-100">
    <h4 class="text-center mb-2">{{ $viewData["subtitle"] }}</h4>
    <div class="container d-flex justify-content-center mb-3">
        <a href="{{ route('tradeProduct.create') }}" class="btn btn-primary active">{{ __('userTradeProduct.create') }}</a>
    </div>

    @if ($viewData["userTradeProducts"])
    @foreach ($viewData["userTradeProducts"] as $userTradeProduct)
    <div class="col-md-6 col-lg-6 mb-3">
        <div class="card mb-3 w-100 bg-dark">
            <div class="row g-2">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $userTradeProduct->image) }}" class="img-fluid rounded-start"
                        alt="{{ $userTradeProduct->getName() }}" style="width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <div class="card-body bg-dark">
                        <h5 class="card-title text-uppercase fw-bold">{{ $userTradeProduct->getName() }}</h5>
                        <p class="card-text text-white"><i class="fa-solid fa-filter"> </i>
                            {{ $userTradeProduct->getType() }}
                        </p>
                        <p class="card-text text-white"><i class="fa-solid fa-money-bill">
                            </i> {{ $userTradeProduct->getOfferType() }}</p>
                        <p class="card-text fw-lighter "><small
                                class="text-white">{{ __('userTradeProduct.published_on') }}
                                {{ $userTradeProduct->getCreatedAt() }}</small></p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('tradeProduct.show', ['id'=> $userTradeProduct->getId()]) }}" class="btn btn-primary active">{{ __('userTradeProduct.see_more') }}</a>
                            <form action="{{ route('tradeProduct.delete', $userTradeProduct->getId())}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary active text-white">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p>{{ __('userTradeProduct.you_dont') }}</p>
    @endif
</div>


@endsection