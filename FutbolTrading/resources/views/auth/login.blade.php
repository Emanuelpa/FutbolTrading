<!-- Emanuel Patiño -->
@extends('layouts.app')

@section('content')
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-dark my-5">
          <div class="card-header font-bold fs-4">{{ __('Auth.login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror auth-field" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Auth.password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password"
                    class="form-control auth-field @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Auth.remember') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-7 offset-md-4">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Auth.forgot') }}
                    </a>
                  @endif
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-7 offset-md-4">
                  <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Auth.dont_have_account') }}
                  </a>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <a href="{{ url()->previous() }}" class="btn btn-secondary me-2 active">{{ __('Home.back') }}</a>
                  <button type="submit" class="btn btn-primary">
                    {{ __('Auth.login') }}
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
