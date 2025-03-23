@extends('layouts.app')
@section('title', __('card.create'))
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-dark">
          <div class="card-header fs-4">{{ __('card.create') }}</div>
          <div class="card-body">

            <div class="card-body">
              @if ($errors->any())
                <ul id="errors" class="alert alert-danger list-unstyled">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif
              <form method="POST" action="{{ route('admin.card.save') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Admin.name') }}</label>

                  <div class="col-md-6">
                    <input id="name" type="text"
                      class="form-control auth-field @error('name') is-invalid @enderror" name="name"
                      value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Admin.image') }}</label>

                  <div class="col-md-6">
                    <input id="image" type="file"
                      class="form-control auth-field @error('image') is-invalid @enderror" name="image" accept="image/*"
                      autofocus>

                    @error('image')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="description"
                    class="col-md-4 col-form-label text-md-end">{{ __('Admin.description') }}</label>
                  <div class="col-md-6">
                    <textarea id="description" class="form-control auth-field @error('description') is-invalid @enderror" name="description"
                      required autocomplete="description" rows="5" style="resize: vertical;">{{ old('description') }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="offerDescription"
                    class="col-md-4 col-form-label text-md-end">{{ __('Admin.price') }}</label>

                  <div class="col-md-6">
                    <input id="price" type="number" step="any"
                      class="form-control auth-field @error('price') is-invalid @enderror" name="price"
                      value="{{ old('price') }}" required autocomplete="price" autofocus>

                    @error('price')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $price }}</strong>
                      </span>
                    @enderror
                  </div>

                </div>

                <div class="row mb-3">
                  <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('Admin.quantity') }}</label>

                  <div class="col-md-6">
                    <input id="quantity" type="number"
                      class="form-control auth-field @error('quantity') is-invalid @enderror" name="quantity"
                      value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                    @error('quantity')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $quantity }}</strong>
                      </span>
                    @enderror
                  </div>

                </div>

                <div class="row mb-0 mt-5 col-md-20 ms-5">
                  <div class="col-md-6 offset-md-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary me-2 active"> <i
                        class="fa-solid fa-arrow-left me-2"></i> {{ __('Admin.back') }}</a>
                    <button type="submit" class="btn btn-primary">
                      {{ __('Admin.create_card') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
