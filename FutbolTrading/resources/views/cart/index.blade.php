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
          <th scope="col">{{__('Cart.id')}}</th> 
          <th scope="col">{{__('Cart.product_name')}}</th> 
          <th scope="col">{{__('Cart.price')}}</th> 
          <th scope="col">{{__('Cart.quantity')}}</th> 
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
        <a href="{{ route('cart.purchase') }}" class="btn bg-success text-white mb-2">{{__('Cart.purchase')}}</a>  
        <form action="{{ route('cart.delete') }}" method="POST" class="me-3 d-inline"> 
          @csrf 
          @method('DELETE')
          <button class="btn bg-success text-white mb-2" style="background-color: #28a745 !important;"> 
            {{__('Cart.remove_all')}} 
          </button> 
        </form>
        @endif 
      </div> 
    </div> 
  </div> 
</div> 
@endsection