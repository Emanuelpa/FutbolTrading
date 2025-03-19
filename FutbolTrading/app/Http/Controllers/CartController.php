<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function add(Request $request, $id)
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

    public function purchase(Request $request)
    {
        $cardsInSession = $request->session()->get('cards');
        if ($cardsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order;
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->setAddress(Auth::user()->getAddress());
            $order->setPaymentMethod('Credit Card');
            $order->save();

            $total = 0;
            $cardsInCart = Card::findMany(array_keys($cardsInSession));
            foreach ($cardsInCart as $card) {
                $quantity = $cardsInSession[$card->getId()];
                $item = new Item;
                $item->setQuantity($quantity);
                $item->setSubtotal($card->getPrice());
                $item->setCardId($card->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($card->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();

            // $newBalance = Auth::user()->getBalance() - $total;
            // Auth::user()->setBalance($newBalance);
            // Auth::user()->save();

            $request->session()->forget('cards');

            $viewData = [];
            $viewData['title'] = 'Purchase completed';
            $viewData['subtitle'] = 'Purchase completed successfully';
            $viewData['order'] = $order;

            return view('cart.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
