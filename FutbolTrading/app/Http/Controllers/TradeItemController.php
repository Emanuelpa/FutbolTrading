<?php

namespace App\Http\Controllers;

use App\Models\TradeItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TradeItemController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = __('TradeIem.tradeItem');
        $viewData['subtitle'] = __('TradeIem.available');
        $viewData['description'] = __('TradeIem.published');
        $viewData['tradeItems'] = TradeItem::all();

        return view('trade.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $tradeItem = TradeItem::findOrFail($id);
            $viewData = [];
            $viewData['title'] = __('TradeIem.see_item').$tradeItem->getName();
            $viewData['subtitle'] = __('TradeIem.see_item');
            $viewData['tradeItem'] = $tradeItem;

            return view('trade.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('trade.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('TradeIem.create');
        $viewData['subtitle'] = __('TradeIem.create_item_to_trade');
        $viewData['description'] = __('TradeIem.please_fill');
        $viewData['typeOptions'] = config('tradeItem.typeOptions');
        $viewData['offerOptions'] = config('tradeItem.offerOptions');

        return view('trade.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        TradeItem::create($request->only(['name', 'type', 'offerType', 'offerDescription', 'image']));
        $viewData = [];
        $viewData['subtitle'] = __('TradeIem.create');
        $viewData['description'] = __('TradeIem.the_item').$request->input('name').__('TradeIem.has_been_created');

        return view('trade.saved')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        TradeItem::destroy($id);

        return redirect()->route('trade.index');
    }
}
