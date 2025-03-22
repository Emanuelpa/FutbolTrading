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

                    <form action="{{ route('admin.trade.update', $viewData['tradeItem']->getId()) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeItem.name') }}</label>
                            <input type="text" name="name" class="form-control auth-field"
                                value="{{ $viewData['tradeItem']->getName() }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeItem.type') }}</label>
                            <select aria-placeholder="Select the type" name="type" class="form-control auth-field"
                                required>
                                @foreach ($viewData['typeOptions'] as $type)
                                <option value="{{ $type }}" class="text-white">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeItem.item_to') }}</label>
                            <select aria-placeholder="Select the type" name="offerType" class="form-control auth-field"
                                required>
                                @foreach ($viewData['offerOptions'] as $offerOption)
                                <option value="{{ $offerOption }}" class="text-white">{{ $offerOption }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeItem.description') }}</label>
                            <textarea name="offerDescription" class="form-control auth-field" rows="3"
                                required>{{ $viewData['tradeItem']->getOfferDescription() }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeItem.user') }}</label>
                            <select aria-placeholder="Select the type" name="user" class="form-control auth-field"
                                required>
                                @foreach ($viewData['users'] as $user)
                                <option value="{{ $user->getId() }}" class="text-white">{{ $user->getName() }}
                                </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="mb-3">
                            <label class="form-label">{{ __('TradeItem.image') }}</label>
                            <input type="text" name="image" class="form-control auth-field"
                                value="{{ $viewData['tradeItem']->getImage() }}">
                        </div>

                        <div class="row mb-0 mt-5 col-md-20 ">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('tradeItem.index') }}" class="btn btn-secondary">
                                    {{ __('Admin.back') }}
                                </a>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Admin.update_item') }}
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