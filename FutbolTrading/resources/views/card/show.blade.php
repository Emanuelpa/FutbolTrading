@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="row w-100">
    <div class="col">
        <div class="card mb-3 w-100 bg-dark">
            <div class="row g-3">
                <div class="col-md-4">
                    <img src="{{ $viewData['card']->getImage() ?? 'https://via.placeholder.com/150' }}" 
                        class="img-fluid rounded-start" 
                        alt="{{ $viewData['card']->getName() }}" 
                        style="width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <div class="card-body bg-dark p-3">
                        <h5 class="card-title text-uppercase fw-bold mb-3">{{ $viewData['card']->getName() }}</h5>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            {{ __('Description: ') }} {{ $viewData['card']->getDescription() ?? 'No description available' }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-money-bill me-2"></i>
                            {{ __('Price: ') }} ${{ number_format($viewData['card']->getPrice(), 2) }}
                        </p>

                        <p class="card-text text-white mb-3">
                            <i class="fa-solid fa-box me-2"></i>
                            {{ __('Quantity: ') }} {{ $viewData['card']->getQuantity() }}
                        </p>

                        <p class="card-text fw-lighter mb-3">
                            <small class="text-white">
                                {{ __('Published_on: ') }} {{ $viewData['card']->getCreatedAt() }}
                            </small>
                        </p>

                        <a href="{{ route('card.index') }}" class="btn btn-primary active">
                            {{ __('Back') }}
                        </a>
                        <form method="POST" action="{{ route('cart.add', ['id' => $viewData['card']->getId()]) }}" class="mt-3">
                            @csrf
                            <div class="input-group" style="max-width: 200px;">
                                <span class="input-group-text bg-secondary text-dark">
                                    <i class="fa-solid fa-cart-plus text-dark"></i> 
                                </span>
                                <input type="number" name="quantity" value="1" min="1" max="{{ $viewData['card']->getQuantity() }}" class="form-control text-light bg-dark border-secondary" required>
                                <button type="submit" class="btn btn-success">
                                    ADD
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
