<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $cardsInCart = [];
        $cardsInSession = $request->session()->get('cards');
        if ($cardsInSession) {
            $cardsInCart = Card::findMany(array_keys($cardsInSession));
            $total = Card::sumPricesByQuantities($cardsInCart, $cardsInSession);
        }
        $viewData = [];
        $viewData['title'] = 'Shopping Cart';
        $viewData['products_in_cart'] = __('Cart.products_in_cart');
        $viewData['total_to_pay'] = __('Cart.total_to_pay');
        $viewData['purchase'] = __('Cart.purchase');
        $viewData['remove_all'] = __('Cart.remove_all');
        $viewData['total'] = $total;
        $viewData['cards'] = $cardsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id): RedirectReponse
    {
        $cards = $request->session()->get('cards');
        $cards[$id] = $request->input('quantity');
        $request->session()->put('cards', $cards);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->session()->forget('cards');

        return back();
    }
}
