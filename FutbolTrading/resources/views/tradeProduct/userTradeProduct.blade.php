<!-- Emanuel Patiño -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

  <div class="row w-100">
    <h4 class="text-center mb-2">{{ $viewData['subtitle'] }}</h4>
    <div class="container d-flex justify-content-center mb-3">
      <a href="{{ route('tradeProduct.create') }}" class="btn btn-primary active">{{ __('UserTradeProduct.create') }}</a>
    </div>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    @if ($viewData['userTradeProducts'])
      @foreach ($viewData['userTradeProducts'] as $userTradeProduct)
        <div class="col-md-6 col-lg-6 mb-3">
          <div class="card mb-3 w-100 bg-dark h-100" style="min-height: 250px;">
            <div class="row g-0 h-100">
              <div class="col-md-4">
                <img src="{{ asset('storage/' . $userTradeProduct->image) }}"
                  class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $userTradeProduct->getName() }}">
              </div>
              <div class="col-md-8 d-flex flex-column">
                <div class="card-body bg-dark flex-grow-1">
                  <h5 class="card-title text-uppercase fw-bold">{{ $userTradeProduct->getName() }}</h5>
                  <p class="card-text text-white"><i class="fa-solid fa-filter"></i>
                    {{ $userTradeProduct->getType() }}
                  </p>
                  <p class="card-text text-white"><i class="fa-solid fa-money-bill"></i>
                    {{ $userTradeProduct->getOfferType() }}
                  </p>
                  <p class="card-text fw-lighter"><small class="text-white">
                      {{ __('UserTradeProduct.published_on') }} {{ $userTradeProduct->getCreatedAt() }}
                    </small></p>
                </div>
                <div class="d-flex gap-2 p-3">
                  <a href="{{ route('tradeProduct.show', ['id' => $userTradeProduct->getId()]) }}"
                    class="btn btn-primary active"><i class="fa-solid fa-eye"></i>
                    {{ __('UserTradeProduct.see_more') }}</a>
                  <form action="{{ route('tradeProduct.delete', $userTradeProduct->getId()) }}" method="POST">
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
      @endforeach
    @else
      <p>{{ __('UserTradeProduct.you_dont') }}</p>
    @endif
  </div>

@endsection
