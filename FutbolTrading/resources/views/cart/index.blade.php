@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('content') 
<div class="card"> 
  <div class="card-header text-dark"> 
  {{__('Cart.products_in_cart')}}
  </div> 
  <div class="card-body"> 
    <table class="table table-bordered table-striped text-center"> 
      <thead> 
        <tr> 
          <th scope="col">ID</th> 
          <th scope="col">Name</th> 
          <th scope="col">Price</th> 
          <th scope="col">Quantity</th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($viewData['cards'] as $card)
        <tr> 
            <td>{{ $card->getId() }}</td>
            <td>{{ $card->getName() }}</td>
            <td>${{ $card->getPrice() }}</td>
            <td>{{ session('cards')[$card->getId()] }}</td>
        </tr>
        @endforeach 
      </tbody> 
    </table> 
    <div class="row"> 
      <div class="text-end"> 
        <a class="btn btn-outline-secondary mb-2"><b>{{__('Cart.total_to_pay')}}:</b> ${{ $viewData["total"] }}</a> 
        @if (count($viewData["cards"]) > 0) 
        <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-dark mb-2">{{__('Cart.purchase')}}</a>  
        <a href="{{ route('cart.delete') }}"> 
          <button class="btn btn-danger mb-2"> 
            {{__('Cart.remove_all')}} 
          </button> 
        </a>
        @endif 
      </div> 
    </div> 
  </div> 
</div> 
@endsection