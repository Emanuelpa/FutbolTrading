@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="row w-100">
    <h4 class="text-center mb-5">{{ $viewData["subtitle"] }}</h4>
    @foreach ($viewData["cards"] as $card)
    <div class="col-md-6 col-lg-6 mb-3">
        <div class="card mb-3 w-100 bg-dark">
            <div class="row g-2">
                <div class="col-md-4">
                    <a href="{{ route('card.show', ['id' => $card->getId()]) }}">
                        <img src="{{ $card->getImage() ?? 'https://via.placeholder.com/150' }}" class="img-fluid rounded-start" 
                            alt="{{ $card->getName() }}" style="width: 100%; height: auto;">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body bg-dark">
                        <h5 class="card-title text-uppercase fw-bold text-white">{{ $card->getName() }}</h5>
                        <p class="card-text text-white"><i class="fa-solid fa-money-bill"></i> ${{ $card->getPrice() }}</p>
                        <a href="{{ route('card.show', ['id'=> $card->getId()]) }}" class="btn btn-primary active">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
