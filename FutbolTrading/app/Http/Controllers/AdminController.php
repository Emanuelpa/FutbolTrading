<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\TradeProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;


class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.admin');
        $viewData['subtitle'] = __('Admin.welcome') . Auth::user()->getName();
        $viewData['description'] = __('Admin.what_would');

        return view('admin.index')->with('viewData', $viewData);
    }

    public function cardDashboard(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.cards_dash');
        $viewData['subtitle'] = __('Admin.cards_admin_panel');
        $viewData['cards'] = Card::all();

        return view('admin.card.dashboard')->with('viewData', $viewData);
    }

    public function tradeDashboard(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.trade_dash');
        $viewData['subtitle'] = __('Admin.trade_admin_panel');
        $viewData['tradeProducts'] = TradeProduct::all();

        return view('admin.trade.dashboard')->with('viewData', $viewData);
    }

    public function showTradeProduct(string $id): View | RedirectResponse
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

    public function showCard(string $id): View | RedirectResponse
    {
        try {

            $viewData = [];
            $card = Card::findOrFail($id);
            $viewData['title'] = __('Admin.see_card') . $card->getName();
            $viewData['subtitle'] = __('Admin.see_card');
            $viewData['card'] = $card;

            return view('admin.card.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.card.dashboard');
        }
    }

    public function editTradeProduct(string $id): View | RedirectResponse
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

    public function editCard(string $id): View | RedirectResponse
    {
        try {

            $viewData = [];
            $card = Card::findOrFail($id);
            $viewData['title'] = __('Admin.see_card') . $card->getName();
            $viewData['subtitle'] = __('Admin.see_card');
            $viewData['card'] = $card;

            return view('admin.card.update')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.card.dashboard');
        }
    }

    public function updateTradeProduct(Request $request, string $id): RedirectResponse
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

        return redirect()->back()->with(__('Admin.success'), __('Admin.has_been_updated'));
    }

    public function updateCard(Request $request, string $id): RedirectResponse
    {
        Card::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        $card = Card::findOrFail($id);

        $updateData = $request->only([
            'name',
            'description',
            'price',
            'quantity',
        ]);

        if ($request->hasFile('image')) {
            $updateData['image'] = $imagePath;
        }

        $card->update($updateData);

        return redirect()->back()->with(__('Admin.success'), __('Admin.has_been_updated'));
    }

    public function createTradeProduct(): View
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

    public function createCard(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.create');
        $viewData['subtitle'] = __('Admin.create_card');
        $viewData['description'] = __('Admin.please_fill');

        return view('admin.card.create')->with('viewData', $viewData);
    }

    public function saveTradeProduct(Request $request): View | RedirectResponse
    {
        TradeProduct::validate($request);
        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);
        TradeProduct::create(array_merge(
            $request->only(['name', 'type', 'offerType', 'offerDescription', 'user']),
            ['image' => $imagePath]
        ));

        $viewData = [];
        $viewData['subtitle'] = __('admin.create');
        $viewData['description'] = __('admin.the_product') . $request->input('name') . __('admin.has_been_created');

        return redirect()->back();
    }

    public function saveCard(Request $request): RedirectResponse
    {
        Card::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        Card::create(array_merge(
            $request->only(['name', 'description', 'price', 'quantity']),
            ['image' => $imagePath]
        ));
        return redirect()->back()->with('success', 'Item created successfully');
    }

    public function deleteTradeProduct(string $id): RedirectResponse
    {
        TradeProduct::destroy($id);

        return redirect()->route('admin.trade.dashboard');
    }

    public function deleteCard(string $id): RedirectResponse
    {
        Card::destroy($id);

        return redirect()->route('admin.card.dashboard');
    }
}
