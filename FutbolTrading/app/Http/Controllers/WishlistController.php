<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $wishlist = Wishlist::with('cards')->where('user', Auth::id())->first();

        $viewData = [];
        $viewData['title'] = __('wishlist.title');
        $viewData['subtitle'] = __('wishlist.subtitle');
        $viewData['cards'] = $wishlist ? $wishlist->cards : collect();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function add(int $cardId): RedirectResponse
    {
        $wishlist = Wishlist::firstOrCreate(['user' => Auth::id()]);
        $card = Card::find($cardId);

        if ($card && ! $wishlist->cards()->where('card_id', $cardId)->exists()) {
            $wishlist->cards()->attach($cardId);
        }

        return redirect()->route('wishlist.index')->with('success', __('wishlist.added'));
    }

    public function remove(int $cardId): RedirectResponse
    {
        $wishlist = Wishlist::where('user', Auth::id())->first();
        $card = Card::find($cardId);

        if ($wishlist && $card) {
            $wishlist->cards()->detach($cardId);
        }

        return redirect()->route('wishlist.index')->with('success', __('wishlist.removed'));
    }
}