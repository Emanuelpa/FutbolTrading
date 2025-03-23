<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\TradeProduct;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;
use App\Http\Controllers\Controller;



class AdminTradeProductController extends Controller
{
    public function dashboard(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.trade_dash');
        $viewData['subtitle'] = __('Admin.trade_admin_panel');
        $viewData['tradeProducts'] = TradeProduct::all();

        return view('admin.trade.dashboard')->with('viewData', $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        try {
            $tradeProduct = TradeProduct::findOrFail($id);
            $viewData = [];
            $viewData['title'] = __('Admin.see_product') . $tradeProduct->getName();
            $viewData['subtitle'] = __('Admin.see_product');
            $viewData['tradeProduct'] = $tradeProduct;

            return view('admin.trade.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.trade.dashboard');
        }
    }

    public function edit(string $id): View | RedirectResponse
    {
        try {
            $tradeProduct = TradeProduct::findOrFail($id);
            $viewData = [];
            $viewData['title'] = __('Admin.see_product') . $tradeProduct->getName();
            $viewData['subtitle'] = __('Admin.see_product');
            $viewData['typeOptions'] = config('tradeProduct.typeOptions');
            $viewData['offerOptions'] = config('tradeProduct.offerOptions');
            $viewData['users'] = User::all();
            $viewData['tradeProduct'] = $tradeProduct;

            return view('admin.trade.update')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.trade.dashboard');
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

        return redirect()->route('admin.trade.dashboard')->with('success', $success);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.create');
        $viewData['subtitle'] = __('Admin.create_product_to_trade');
        $viewData['description'] = __('Admin.please_fill');
        $viewData['users'] = User::all();
        $viewData['typeOptions'] = config('tradeProduct.typeOptions');
        $viewData['offerOptions'] = config('tradeProduct.offerOptions');

        return view('admin.trade.create')->with('viewData', $viewData);
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

        return redirect()->route('admin.trade.dashboard')->with('success', $success);
    }

    public function delete(string $id): RedirectResponse
    {
        TradeProduct::destroy($id);

        $success = __('Admin.the_product') . ' ' . __('Admin.has_been_deleted');

        return redirect()->route('admin.trade.dashboard')->with('success', $success);
    }
}
