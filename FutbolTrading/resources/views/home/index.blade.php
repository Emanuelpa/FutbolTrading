@extends('layouts.app')


@section('title', __('Home.welcome'))


@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<h1 class="mb-4">{{ __('Home.welcome') }}</h1>
<section class="hero">
    <div class="hero-content">
        <h1>{{__('Home.transform')}}</h1>
        <p>{{__('Home.transformDescription')}}</p>
        @guest
        <a href="{{ route('login') }}" class="btn btn-primary active">{{ __('Home.login') }}</a>
        @else
        <a href="" class="btn btn-primary active">{{ __('Home.shop') }}</a>
        @endguest

    </div>
    <div class="hero-image">
        <img src="{{ asset('images/futbolTraiding.png') }}" alt="Soccer Cards">
    </div>
</section>


<section class="features">
    <div class="feature">
        <h2>{{__('Home.authenticCards')}}</h2>
        <p>{{__('Home.authenticCardsDescription')}}</p>
    </div>
    <div class="feature">
        <h2>{{__('Home.rareFinds')}}</h2>
        <p>{{__('Home.rareFindsDescription')}}</p>
    </div>
</section>
@endsection