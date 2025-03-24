@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<div class="row w-100">
  <h4 class="text-center mb-3">{{ $viewData['subtitle'] }}</h4>
  <div class="container">
    <div class="card bg-dark text-white">
      <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
        <h5 class="mb-0 p-1">{{ __('Admin.available') }}</h5>
        <div>
          <a href="{{ route('admin.card.create') }}" class="btn btn-primary">
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
              <th>{{ __('Admin.image') }}</th>
              <th>{{ __('Admin.price') }}</th>
              <th>{{ __('Admin.quantity') }}</th>
              <th>{{ __('Admin.created') }}</th>
              <th>{{ __('Admin.updated') }}</th>
              <th>{{ __('Admin.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($viewData['cards'] as $card)
            <tr>
              <td>{{ $card->getId() }}</td>
              <td>{{ $card->getName() }}</td>
              <td>
                <img src="{{ asset('storage/' . $card->getImage()) }}" class="img-fluid rounded" width="50">
              </td>
              <td>${{ number_format($card->getPrice(), 2) }}</td>
              <td>{{ $card->getQuantity() }}</td>
              <td>{{ $card->getCreatedAt() }}</td>
              <td>{{ $card->getUpdatedAt() }}</td>
              <td>
                <a href="{{ route('admin.card.show', ['id' => $card->getId()]) }}" class="btn btn-primary active">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('admin.card.edit', ['id' => $card->getId()]) }}" class="btn btn-primary active">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="{{ route('admin.card.delete', $card->getId()) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-primary active" onclick="return confirm('Are you sure?')">
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