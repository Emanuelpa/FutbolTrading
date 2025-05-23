<!-- Emanuel Patiño -->
@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-dark">
          <div class="card-header fs-4">{{ __('TradeProduct.create_product') }}</div>

          <div class="card-body">
            @if ($errors->any())
              <ul id="errors" class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
            <form method="POST" action="{{ route('admin.tradeProduct.save') }}" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control auth-field @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
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
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('TradeProduct.type') }}</label>
                <div class="col-md-6">
                  <select aria-placeholder="Select the type" name="type" class="form-control auth-field" required>
                    @foreach ($viewData['typeOptions'] as $type)
                      <option value="{{ $type }}" class="text-white">{{ $type }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="offerType"
                  class="col-md-4 col-form-label text-md-end">{{ __('TradeProduct.offer_type') }}</label>
                <div class="col-md-6">
                  <select aria-placeholder="Select the type" name="offerType" class="form-control auth-field" required>
                    @foreach ($viewData['offerOptions'] as $offerOption)
                      <option value="{{ $offerOption }}" class="text-white">{{ $offerOption }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="offerDescription"
                  class="col-md-4 col-form-label text-md-end">{{ __('TradeProduct.offer_description') }}</label>

                <div class="col-md-6">
                  <textarea id="offerDescription" class="form-control auth-field @error('offerDescription') is-invalid @enderror"
                    name="offerDescription" required autocomplete="offerDescription" rows="5" style="resize: vertical;">{{ old('offerDescription') }}</textarea>

                  @error('offerDescription')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="user" class="col-md-4 col-form-label text-md-end">{{ __('TradeProduct.user') }}</label>
                <div class="col-md-6">
                  <select aria-placeholder="Select the type" name="user" class="form-control auth-field" required>
                    @foreach ($viewData['users'] as $user)
                      <option value="{{ $user->getId() }}" class="text-white">{{ $user->getName() }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-0 mt-5 col-md-20 ms-5">
                <div class="col-md-6 offset-md-4">
                  <a href="{{ url()->previous() }}" class="btn btn-secondary me-2 active"><i
                      class="fa-solid fa-arrow-left me-2"></i>
                    {{ __('TradeProduct.back') }}</a>
                  <button type="submit" class="btn btn-primary">
                    {{ __('TradeProduct.create') }}
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
