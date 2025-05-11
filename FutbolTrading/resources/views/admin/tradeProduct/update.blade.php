<!-- Emanuel Patiño -->
@extends('layouts.app')
@section('title', __('Admin.see_product') . $viewData['tradeProduct']->getName())
@section('subtitle', __('Admin.see_product'))
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card bg-dark text-light shadow-lg border-0 mb-4">

                <div class="card-body p-4">
                    <h4 class="card-title text-uppercase fw-bold mb-3 text-center">{{ __('Admin.edit') }}</h4>

                    <form action="{{ route('admin.tradeProduct.update', $viewData['tradeProduct']->getId()) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeProduct.name') }}</label>
                            <input type="text" name="name" class="form-control auth-field"
                                value="{{ $viewData['tradeProduct']->getName() }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeProduct.type') }}</label>
                            <select name="type" class="form-control auth-field" required>
                                @foreach ($viewData['typeOptions'] as $type)
                                <option value="{{ $type }}" class="text-white"
                                    {{ $type == $viewData['tradeProduct']->getType() ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeProduct.product_to') }}</label>
                            <select name="offerType" class="form-control auth-field" required>
                                @foreach ($viewData['offerOptions'] as $offerOption)
                                <option value="{{ $offerOption }}" class="text-white"
                                    {{ $offerOption == $viewData['tradeProduct']->getOfferType() ? 'selected' : '' }}>
                                    {{ $offerOption }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeProduct.description') }}</label>
                            <textarea name="offerDescription" class="form-control auth-field" rows="3"
                                required>{{ $viewData['tradeProduct']->getOfferDescription() }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeProduct.user') }}</label>
                            <select name="user" class="form-control auth-field" required>
                                @foreach ($viewData['users'] as $user)
                                <option value="{{ $user->getId() }}" class="text-white"
                                    {{ $user->getId() == $viewData['tradeProduct']->getUser()->getId() ? 'selected' : '' }}>
                                    {{ $user->getName() }}
                                </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('Admin.image') }}</label>
                            <div class="mb-2">
                                <img id="imagePreview"
                                    src="{{ asset('storage/' . $viewData['tradeProduct']->getImage()) }}"
                                    alt="Current Image" class="img-fluid rounded d-block mx-auto w-25">
                            </div>

                            <input id="image" type="file"
                                class="form-control auth-field @error('image') is-invalid @enderror" name="image"
                                accept="image/*" autofocus">
                        </div>

                        <div class="row mb-0 mt-5 col-md-20 ">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i
                                        class="fa-solid fa-arrow-left me-2"></i>
                                    {{ __('Admin.back') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Admin.update_product') }}
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