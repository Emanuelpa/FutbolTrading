<?php

// Emanuel Patiño

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\TradeProduct;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TradeProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['tradeProducts'] = TradeProduct::where('user', '!=', Auth::id())->get();

        return view('tradeProduct.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $tradeProduct = TradeProduct::findOrFail($id);
            $viewData = [];
            $viewData['tradeProduct'] = $tradeProduct;

            return view('tradeProduct.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tradeProduct.index');
        }
    }

    public function userTradeProductsIndex(): view
    {
        $user = Auth::user();
        $viewData = [];
        $viewData['userTradeProducts'] = $user->getTradeProducts();

        return view('tradeProduct.userTradeProduct')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['typeOptions'] = config('tradeProduct.typeOptions'); // enum
        $viewData['offerOptions'] = config('tradeProduct.offerOptions');

        return view('tradeProduct.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
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

        $success = __('TradeProduct.the_product').' '.$request->input('name').' '.__('TradeProduct.has_been_created');

        return redirect()->route('tradeProduct.userTradeProduct')->with('success', $success);
    }

    public function delete(string $id): RedirectResponse
    {
        TradeProduct::destroy($id);

        $success = __('TradeProduct.the_product').' '.__('TradeProduct.has_been_deleted');

        return redirect()->route('tradeProduct.userTradeProduct')->with('success', $success);
    }

    public function filterByType(Request $request): View
    {
        $type = $request->input('type');

        $query = TradeProduct::where('user', '!=', Auth::id());

        if (! empty($type) && $type !== 'all') {
            $query->where('type', $type);
        }

        $viewData = [];
        $viewData['tradeProducts'] = $query->get();

        return view('tradeProduct.index')->with('viewData', $viewData);
    }
}
