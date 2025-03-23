@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row justify-content-center w-100">
    <div class="col-lg-10 col-md-12">
        <div class="card bg-dark text-light shadow-lg border-0 mb-4">
            <div class="row g-0 align-items-center">

                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $viewData['card']->getImage()) }}"
                        class="img-fluid rounded-start object-fit-cover" alt="{{ $viewData['card']->getName() }}"
                        style="width: 100%; height: 100%; max-height: 300px;">
                </div>

                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h4 class="card-title text-uppercase fw-bold mb-3">
                            {{ $viewData['card']->getName() }}
                        </h4>

                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fa-solid fa-filter me-2 text-primary"></i>
                                <strong>{{ __('Admin.description') }}:</strong>
                                {{ $viewData['card']->getDescription() }}
                            </li>
                            <li class="mb-2">
                                <i class="fa-solid fa-user me-2 text-primary"></i>
                                <strong>{{ __('Admin.price') }}:</strong>
                                {{ $viewData['card']->getPrice() }}
                            </li>
                            <li class="mb-2">
                                <i class="fa-solid fa-location-dot me-2 text-primary"></i>
                                <strong>{{ __('Admin.quantity') }}:</strong>
                                {{ $viewData['card']->getQuantity() }}
                            </li>

                        </ul>

                        <p class="text-muted small mb-3">
                            <i class="fa-solid fa-calendar-alt me-2"></i>
                            {{ __('Admin.published_on') }} {{ $viewData['card']->getCreatedAt() }}
                        </p>

                        <a href="{{ route('admin.card.dashboard') }}" class="btn btn-primary">
                            <i class="fa-solid fa-arrow-left me-2"></i> {{ __('Admin.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection