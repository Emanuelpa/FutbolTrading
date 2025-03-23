@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-dark">
          <div class="card-header fs-4">{{ __('Register') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
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
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email"
                    class="form-control auth-field @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Auth.phone_number') }}</label>

                <div class="col-md-6">
                  <input id="phone" type="text"
                    class="form-control auth-field @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone">

                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('Auth.city') }}</label>

                <div class="col-md-6">
                  <input id="city" type="text" class="form-control auth-field @error('city') is-invalid @enderror"
                    name="city" value="{{ old('city') }}" required autocomplete="city">

                  @error('city')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Auth.address') }}</label>

                <div class="col-md-6">
                  <input id="address" type="text"
                    class="form-control auth-field @error('address') is-invalid @enderror" name="address"
                    value="{{ old('address') }}" required autocomplete="address">

                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password"
                    class="form-control auth-field @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password-confirm"
                  class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control auth-field"
                    name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>

              <div class="row mb-0 mt-5 col-md-20">
                <div class="col-md-6 offset-md-4">
                  <a href="{{ url()->previous() }}" class="btn btn-secondary me-2 active">{{ __('Home.back') }}</a>
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
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
