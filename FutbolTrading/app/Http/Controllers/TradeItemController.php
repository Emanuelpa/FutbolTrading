<?php

namespace App\Http\Controllers;

use App\Models\TradeItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TradeItemController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = __('TradeItem.tradeItem');
        $viewData['subtitle'] = __('TradeItem.available');
        $viewData['description'] = __('TradeItem.published');
        $viewData['tradeItems'] = TradeItem::where('user', '!=', Auth::id())->get();

        return view('tradeItem.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $tradeItem = TradeItem::findOrFail($id);
            $viewData = [];
            $viewData['title'] = __('TradeItem.see_item').$tradeItem->getName();
            $viewData['subtitle'] = __('TradeItem.see_item');
            $viewData['tradeItem'] = $tradeItem;

            return view('tradeItem.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('trade.index');
        }
    }

    public function userTradeItemsIndex()
    {
        $user = Auth::user();
        $viewData = [];
        $viewData['title'] = __('userTradeItem.your_items');
        $viewData['subtitle'] = __('userTradeItem.your_items');
        $viewData['userTradeItems'] = $user->tradeItems;

        return view('tradeItem.userTradeItem')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('TradeItem.create');
        $viewData['subtitle'] = __('TradeItem.create_item_to_trade');
        $viewData['description'] = __('TradeItem.please_fill');
        $viewData['typeOptions'] = config('tradeItem.typeOptions');
        $viewData['offerOptions'] = config('tradeItem.offerOptions');

        return view('tradeItem.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View|RedirectResponse
    {
        $user = Auth::user();

        TradeItem::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'offerType' => $request->input('offerType'),
            'offerDescription' => $request->input('offerDescription'),
            'image' => $request->input('image'),
            'user' => $user->id,
        ]);
        $viewData = [];
        $viewData['subtitle'] = __('TradeItem.create');
        $viewData['description'] = __('TradeItem.the_item').$request->input('name').__('TradeItem.has_been_created');

        return redirect()->back();
    }

    public function delete(string $id): RedirectResponse
    {
        TradeItem::destroy($id);

        return redirect()->route('tradeItem.userTradeItem');
    }

    public function filterByType(Request $request)
{
    $type = $request->input('type');

    $viewData = [];
    $viewData['title'] = __('TradeItem.tradeItem');
    $viewData['subtitle'] = __('TradeItem.available');
    $viewData['description'] = __('TradeItem.filtered_by') . ' ' . $type;

    $query = TradeItem::where('user', '!=', Auth::id());

    if (!empty($type)) {
        $query->where('type', $type);
    }
    $viewData['tradeItems'] = $query->get();

    return view('tradeItem.index')->with('viewData', $viewData);
}

}
