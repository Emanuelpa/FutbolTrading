<?php

namespace App\Http\Controllers;

use App\Models\TradeProduct;
use App\Interfaces\ImageStorage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TradeProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = __('TradeProduct.tradeProduct');
        $viewData['subtitle'] = __('TradeProduct.available');
        $viewData['description'] = __('TradeProduct.published');
        $viewData['tradeProducts'] = TradeProduct::where('user', '!=', Auth::id())->get();

        return view('tradeProduct.index')->with('viewData', $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        try {
            $tradeProduct = TradeProduct::findOrFail($id);
            $viewData = [];
            $viewData['title'] = __('TradeProduct.see_product') . $tradeProduct->getName();
            $viewData['subtitle'] = __('TradeProduct.see_product');
            $viewData['tradeProduct'] = $tradeProduct;

            return view('tradeProduct.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('trade.index');
        }
    }

    public function userTradeProductsIndex(): view
    {
        $user = Auth::user();
        $viewData = [];
        $viewData['title'] = __('UserTradeProduct.your_products');
        $viewData['subtitle'] = __('UserTradeProduct.your_products');
        $viewData['userTradeProducts'] = $user->getTradeProducts();

        return view('tradeProduct.userTradeProduct')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('TradeProduct.create');
        $viewData['subtitle'] = __('TradeProduct.create_product_to_trade');
        $viewData['description'] = __('TradeProduct.please_fill');
        $viewData['typeOptions'] = config('tradeProduct.typeOptions');
        $viewData['offerOptions'] = config('tradeProduct.offerOptions');

        return view('tradeProduct.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View | RedirectResponse
    {
        $user = Auth::user();
        TradeProduct::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        TradeProduct::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'offerType' => $request->input('offerType'),
            'offerDescription' => $request->input('offerDescription'),
            'image' => $imagePath,
            'user' => $user->getId(),
        ]);
        $viewData = [];
        $viewData['subtitle'] = __('TradeProduct.create');
        $viewData['description'] = __('TradeProduct.the_product') . $request->input('name') . __('TradeProduct.has_been_created');

        return redirect()->back();
    }

    public function delete(string $id): RedirectResponse
    {
        TradeProduct::destroy($id);

        return redirect()->route('tradeProduct.userTradeProduct');
    }

    public function filterByType(Request $request)
    {
        $type = $request->input('type');

        $viewData = [];
        $viewData['title'] = __('TradeProduct.tradeItem');
        $viewData['subtitle'] = __('TradeProduct.available');
        $viewData['description'] = __('TradeProduct.filtered_by') . ' ' . $type;

        $query = TradeProduct::where('user', '!=', Auth::id());

        if (! empty($type)) {
            $query->where('type', $type);
        }
        $viewData['tradeProducts'] = $query->get();

        return view('tradeProduct.index')->with('viewData', $viewData);
    }
}
