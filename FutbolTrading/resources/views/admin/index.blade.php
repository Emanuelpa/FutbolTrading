@extends('layouts.app')


@section('title', $viewData["title"])


@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<h1 class="mb-4"> {{ $viewData["subtitle"] }}</h1>


<section class="features">
    <div class="feature">
        <h2>{{ __('Admin.cards_dash') }}</h2>
        <p>{{ __('Admin.manage_card') }}</p>
        <img src="{{ asset('images/card.png') }}" alt="Card Image" class="img-fluid">
        <a href="{{ route('admin.card.dashboard') }}" class="btn btn-primary active mt-3 w-100"><i
                class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="feature">
        <h2>{{ __('Admin.trade_dash') }}</h2>
        <p>{{ __('Admin.manage_trade') }}</p>
        <img src="{{ asset('images/trade.png') }}" alt="Card Image" class="img-fluid">
        <a href="{{ route('admin.trade.dashboard') }}" class="btn btn-primary active mt-3 w-100"><i
                class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>
@endsection