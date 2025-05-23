<!-- Emanuel Patiño -->
@extends('layouts.app')
@section('title', __('Admin.trade_dash'))
@section('subtitle', __('Admin.trade_admin_panel'))
@section('content')

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="row w-100">
    <h4 class="text-center mb-3">{{ __('Admin.trade_admin_panel') }}</h4>
    <div class="container">
      <div class="card bg-dark text-white">
        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
          <h5 class="mb-0 p-1">{{ __('Admin.available') }}</h5>
          <div>
            <a href="{{ route('admin.tradeProduct.create') }}" class="btn btn-primary">
              <i class="fa-solid fa-plus"></i>
            </a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 custom-dark-table">
            <thead>
              <tr>
                <th>{{ __('Admin.id') }}</th>
                <th>{{ __('Admin.name') }}</th>
                <th>{{ __('Admin.type') }}</th>
                <th>{{ __('Admin.image') }}</th>
                <th>{{ __('Admin.offer_type') }}</th>
                <th>{{ __('Admin.description') }}</th>
                <th>{{ __('Admin.user') }}</th>
                <th>{{ __('Admin.created') }}</th>
                <th>{{ __('Admin.updated') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($viewData['tradeProducts'] as $tradeProduct)
                <tr>
                  <td>{{ $tradeProduct->getId() }}</td>
                  <td>{{ $tradeProduct->getName() }}</td>
                  <td>{{ $tradeProduct->getType() }}</td>
                  <td>
                    <img src="{{ asset('storage/' . $tradeProduct->getImage()) }}" class="img-fluid rounded"
                      width="50">
                  </td>
                  <td>{{ $tradeProduct->getOfferType() }}</td>
                  <td>{{ Str::limit($tradeProduct->getOfferDescription(), 20, '...') }}</td>
                  <td>{{ $tradeProduct->getUser()->getName() }}</td>
                  <td>{{ Str::limit($tradeProduct->getCreatedAt(), 10, '') }}</td>
                  <td>
                    <a href="{{ route('admin.tradeProduct.show', ['id' => $tradeProduct->getId()]) }}"
                      class="btn btn-primary active">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.tradeProduct.edit', ['id' => $tradeProduct->getId()]) }}"
                      class="btn btn-primary active">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.tradeProduct.delete', $tradeProduct->getId()) }}" method="POST"
                      class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-primary active" onclick="return confirm(__('Admin.are_you_sure'))">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
        </div>
      </div>
    </div>
  </div>
@endsection
