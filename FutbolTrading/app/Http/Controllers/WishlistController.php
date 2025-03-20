<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user', Auth::id())->first();

        $viewData = [
            'title' => 'Wishlist - Online Store',
            'subtitle' => 'Your saved cards',
            'cards' => $wishlist ? $wishlist->getCards() : collect(),
        ];

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function add(int $cardId): RedirectResponse
    {
        $wishlist = Wishlist::firstOrCreate(['user' => Auth::id()], ['cards' => []]);

        $cards = is_array($wishlist->cards) ? $wishlist->cards : [];

        if (! in_array($cardId, $cards)) {
            $cards[] = $cardId;
            $wishlist->update(['cards' => $cards]);
        }

        return redirect()->route('wishlist.index')->with('success', 'Card added to your wishlist.');
    }

    public function remove(int $cardId): RedirectResponse
    {
        $wishlist = Wishlist::where('user', Auth::id())->first();

        if ($wishlist) {
            $cards = is_array($wishlist->cards) ? $wishlist->cards : [];
            $cards = array_filter($cards, fn ($id) => $id != $cardId);

            $wishlist->update(['cards' => array_values($cards)]);
        }

        return redirect()->route('wishlist.index')->with('success', 'Card removed from your wishlist.');
    }
}
