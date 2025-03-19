<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Wishlist - Online Store';
        $viewData['subtitle'] = 'Your saved cards';
        $viewData['cards'] = Wishlist::where('user', Auth::id())->with('cards')->get();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function remove(int $card_id): RedirectResponse
    {
        $wishlist = Wishlist::where('user', Auth::id())->where('card', $card_id)->first();
    
        if ($wishlist) {
            $wishlist->delete();
        }
    
        return redirect()->route('wishlist.index')->with('success', 'Card removed from your wishlist.');
    }
    
}
