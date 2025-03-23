@extends('layouts.app')
@section('title', __('card.create'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header fs-4">{{ __('card.create') }}</div>
                <div class="card-body">

                    @if($errors->any())
                        <ul id="errors" class="alert alert-danger list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('card.save') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('card.name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control auth-field @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('card.description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control auth-field @error('description') is-invalid @enderror"
                                    name="description" required rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('card.image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control auth-field @error('image') is-invalid @enderror"
                                    name="image" value="{{ old('image') }}" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('card.price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01"
                                    class="form-control auth-field @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('card.quantity') }}</label>
                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control auth-field @error('quantity') is-invalid @enderror"
                                    name="quantity" value="{{ old('quantity') }}" required>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mt-5 col-md-20 ms-5">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('card.index') }}" class="btn btn-primary me-2 active">{{ __('card.back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('card.add') }}</button>
                            </div>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
