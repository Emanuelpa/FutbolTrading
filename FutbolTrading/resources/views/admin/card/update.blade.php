@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card bg-dark text-light shadow-lg border-0 mb-4">

                <div class="card-body p-4">
                    <h4 class="card-title text-uppercase fw-bold mb-3 text-center">{{ __('Admin.edit') }}</h4>

                    <form action="{{ route('admin.card.update', $viewData['card']->getId()) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">{{ __('Admin.name') }}</label>
                            <input type="text" name="name" class="form-control auth-field"
                                value="{{ $viewData['card']->getName() }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Admin.description') }}</label>
                            <textarea name="description" class="form-control auth-field" rows="3"
                                required>{{ $viewData['card']->getDescription() }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Admin.price') }}</label>
                            <input type="number" name="price" step="any" class="form-control auth-field"
                                value="{{ $viewData['card']->getPrice() }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Admin.quantity') }}</label>
                            <input type="number" name="quantity" class="form-control auth-field"
                                value="{{ $viewData['card']->getQuantity() }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('Admin.image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file"
                                    class="form-control auth-field @error('image') is-invalid @enderror" name="image"
                                    accept="image/*" value="{{ $viewData['card']->getImage() }}" autofocus>
                            </div>
                        </div>

                        <div class="row mb-0 mt-5 col-md-20 ">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('admin.card.dashboard') }}" class="btn btn-secondary">
                                    {{ __('Admin.back') }}
                                </a>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Admin.update') }}
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