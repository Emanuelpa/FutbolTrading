<?php

// Emanuel Patiño

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\TradeProduct;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTradeProductController extends Controller
{
    public function dashboard(): View
    {
        $viewData = [];
        $viewData['tradeProducts'] = TradeProduct::all();

        return view('admin.tradeProduct.dashboard')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $tradeProduct = TradeProduct::findOrFail($id);
            $viewData = [];
            $viewData['tradeProduct'] = $tradeProduct;

            return view('admin.tradeProduct.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.tradeProduct.dashboard');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
        try {
            $tradeProduct = TradeProduct::findOrFail($id);
            $viewData = [];
            $viewData['typeOptions'] = config('tradeProduct.typeOptions');
            $viewData['offerOptions'] = config('tradeProduct.offerOptions');
            $viewData['users'] = User::all();
            $viewData['tradeProduct'] = $tradeProduct;

            return view('admin.tradeProduct.update')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.tradeProduct.dashboard');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        TradeProduct::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        $tradeProduct = TradeProduct::findOrFail($id);

        $updateData = $request->only([
            'name',
            'type',
            'offerType',
            'offerDescription',
            'user',
        ]);

        if ($request->hasFile('image')) {
            $updateData['image'] = $imagePath;
        }

        $tradeProduct->update($updateData);

        $success = __('Admin.the_product') . ' ' . $request->input('name') . ' ' . __('Admin.has_been_updated');

        return redirect()->route('admin.tradeProduct.dashboard')->with('success', $success);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['users'] = User::all();
        $viewData['typeOptions'] = config('tradeProduct.typeOptions');
        $viewData['offerOptions'] = config('tradeProduct.offerOptions');

        return view('admin.tradeProduct.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        TradeProduct::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        TradeProduct::create(array_merge(
            $request->only(['name', 'type', 'offerType', 'offerDescription', 'user']),
            ['image' => $imagePath]
        ));

        $success = __('Admin.the_product') . ' ' . $request->input('name') . ' ' . __('Admin.has_been_created');

        return redirect()->route('admin.tradeProduct.dashboard')->with('success', $success);
    }

    public function delete(string $id): RedirectResponse
    {
        TradeProduct::destroy($id);

        $success = __('Admin.the_product') . ' ' . __('Admin.has_been_deleted');

        return redirect()->route('admin.tradeProduct.dashboard')->with('success', $success);
    }
}
