@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header text-dark">{{__('Purchase.purchase_complete')}}</div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            {{__('Purchase.congratulations')}} <b>{{ $viewData["order"]->getId() }} </b>
        </div>
    </div>
    </div> 
    <a href="{{ route('cart.downloadInvoice', ['id' => $viewData['order']->getId()]) }}" class="btn btn-primary">{{__('Purchase.downloadPDF')}}</a>
    </div> 
    </div> 
@endsection