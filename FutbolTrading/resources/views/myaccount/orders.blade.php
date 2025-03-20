@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 

<form action="{{ route('myaccount.orders') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="search ID" value="{{ request('search') }}" style="color: black; background-color: white; caret-color: black;">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

@forelse ($viewData["orders"] as $order) 
<div class="card mb-4"> 
  <div class="card-header text-dark"> 
  {{__('MyAccount.order')}} {{ $order->getId() }} 
  </div> 
  <div class="card-body text-dark"> 
    <b>Date:</b> {{ $order->getCreatedAt() }}<br /> 
    <b>Total:</b> ${{ $order->getTotal() }}<br />
    <b>Método de Pago:</b> {{ $order->getPaymentMethod() }}<br />
    <table class="table table-bordered table-striped text-center mt-3"> 
      <thead> 
        <tr> 
          <th scope="col">Item ID</th> 
          <th scope="col">Product Name</th> 
          <th scope="col">Price</th> 
          <th scope="col">Quantity</th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($order->getItems() as $item) 
        <tr> 
          <td>{{ $item->getId() }}</td> 
          <td> 
            <a class="link-success" href="{{ route('card.show', ['id'=> $item->getCard()->getId()]) }}"> 
              {{ $item->getCard()->getName() }} 
            </a> 
          </td> 
          <td>${{ $item->getSubtotal() }}</td> 
          <td>{{ $item->getQuantity() }}</td> 
        </tr> 
        @endforeach 
      </tbody> 
    </table> 
  </div> 
</div> 
@empty 
<div class="alert alert-danger" role="alert"> 
{{__('MyAccount.not_purchased')}}
</div> 
@endforelse 
@endsection