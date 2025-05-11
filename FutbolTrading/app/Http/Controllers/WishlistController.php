<?php

// MarcelaLondoño

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $wishlist = Wishlist::where('user', Auth::id())->first();

        $viewData = [];
        $viewData['cards'] = $wishlist ? $wishlist->getCards() : collect();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function add(string $cardId): RedirectResponse
    {
        $wishlist = Wishlist::firstOrCreate(['user' => Auth::id()], ['cards' => []]);

        $cards = is_array($wishlist->cards) ? $wishlist->cards : [];

        if (! in_array($cardId, $cards)) {
            $cards[] = $cardId;
            $wishlist->update(['cards' => $cards]);
        }

        return redirect()->route('wishlist.index')->with('success', __('wishlist.added'));
    }

    public function remove(int $cardId): RedirectResponse
    {
        $wishlist = Wishlist::where('user', Auth::id())->first();

        if ($wishlist) {
            $cards = is_array($wishlist->cards) ? $wishlist->cards : [];
            $cards = array_filter($cards, fn($id) => $id != $cardId);

            $wishlist->update(['cards' => array_values($cards)]);
        }

        return redirect()->route('wishlist.index')->with('success', __('wishlist.removed'));
    }
}
