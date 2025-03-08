<?php

namespace App\Http\Controllers;

use App\Models\TradeItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TradeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Trade Item';
        $viewData['subtitle'] = 'Available Items';
        $viewData['description'] = 'Published by others';
        $viewData['tradeItems'] = TradeItem::all();

        return view('trade.index')->with('viewData', $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        try {
            $tradeItem = TradeItem::findOrFail($id);
            $viewData = [];
            $viewData['title'] = 'See Item ' . $tradeItem->getName();
            $viewData['subtitle'] = 'See Item';
            $viewData['tradeItem'] = $tradeItem;

            return view('trade.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('trade.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Item';
        $viewData['subtitle'] = 'Create Item to trade';
        $viewData['description'] = 'Please fill in the following fields to publish your item';
        $viewData['typeOptions'] = config('tradeItem.typeOptions');
        $viewData['offerOptions'] = config('tradeItem.offerOptions');

        return view('trade.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        TradeItem::create($request->only(['name', 'type', 'offerType', 'offerDescription', 'image']));
        $viewData = [];
        $viewData['subtitle'] = 'Create Item';
        $viewData['description'] = 'The Item ' . $request->input('name') . ' has been created successfully';

        return view('trade.saved')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        TradeItem::destroy($id);

        return redirect()->route('trade.index');
    }
}
