@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row w-100">
    <h4 class="text-center mb-2">{{ $viewData["subtitle"] }}</h4>
    <div class="container d-flex justify-content-center mb-3">
        <a href="{{ route('tradeItem.create') }}" class="btn btn-primary active">{{ __('userTradeItem.create') }}</a>
    </div>

    @foreach ($viewData["userTradeItems"] as $userTradeItem)
    <div class="col-md-6 col-lg-6 mb-3">
        <div class="card mb-3 w-100 bg-dark">
            <div class="row g-2">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $userTradeItem->image) }}" class="img-fluid rounded-start"
                        alt="{{ $userTradeItem->getName() }}" style="width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <div class="card-body bg-dark">
                        <h5 class="card-title text-uppercase fw-bold">{{ $userTradeItem->getName() }}</h5>
                        <p class="card-text text-white"><i class="fa-solid fa-filter"> </i>
                            {{ $userTradeItem->getType() }}
                        </p>
                        <p class="card-text text-white"><i class="fa-solid fa-money-bill">
                            </i> {{ $userTradeItem->getOfferType() }}</p>
                        <p class="card-text fw-lighter "><small
                                class="text-white">{{ __('userTradeItem.published_on') }}
                                {{ $userTradeItem->getCreatedAt() }}</small></p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('tradeItem.show', ['id'=> $userTradeItem->getId()]) }}" class="btn btn-primary active">{{ __('userTradeItem.see_more') }}</a>
                            <form action="{{ route('tradeItem.delete', $userTradeItem->getId())}}" method="POST">
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
</div>


@endsection