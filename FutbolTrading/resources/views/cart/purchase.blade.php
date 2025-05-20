<!-- TomasPineda -->
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header text-dark">{{ __('Purchase.purchase_complete') }}</div>
    <div class="card-body">
      <div class="alert alert-success" role="alert">
        {{ __('Purchase.congratulations') }} <b>{{ $viewData['order']->getId() }} </b>
      </div>
    </div>
  </div>

  <div class="mt-3">
    <a href="{{ route('cart.downloadInvoice', ['id' => $viewData['order']->getId(), 'type' => 'dompdf']) }}"
      class="btn btn-primary">
      {{ __('Purchase.downloadPDF') }} (DomPDF)
    </a>
    <a href="{{ route('cart.downloadInvoice', ['id' => $viewData['order']->getId(), 'type' => 'mpdf']) }}"
      class="btn btn-success ml-2">
      {{ __('Purchase.downloadPDF') }} (mPDF)
    </a>
  </div>
@endsection
