<?php

// TomasPineda

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Item;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $viewData['title'] = __('Cart.title');
        $viewData['products_in_cart'] = __('Cart.products_in_cart');
        $viewData['total_to_pay'] = __('Cart.total_to_pay');
        $viewData['purchase'] = __('Cart.purchase');
        $viewData['remove_all'] = __('Cart.remove_all');
        $viewData['total'] = $total;
        $viewData['cards'] = $cardsInCart;
        $viewData['id'] = __('Cart.id');
        $viewData['product_name'] = __('Cart.product_name');
        $viewData['price'] = __('Cart.price');
        $viewData['quantity'] = __('Cart.quantity');

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, string $id): RedirectResponse
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

    public function purchase(Request $request): View|RedirectResponse
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
                $card->setQuantity($card->getQuantity() - $quantity);
                $card->save();
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
            $request->session()->forget('cards');
            $viewData = [];
            $viewData['purchase_complete'] = __('Purchase.purchase_complete');
            $viewData['congratulations'] = __('Purchase.congratulations');
            $viewData['downloadPDF'] = __('Purchase.downloadPDF');
            $viewData['order'] = $order;
            $viewData['purchase_invoice'] = __('Purchase.purchase_invoice');
            $viewData['order_number'] = __('Purchase.order_number');
            $viewData['date'] = __('Purchase.date');
            $viewData['total'] = __('Purchase.total');

            return view('cart.purchase')->with('viewData', $viewData);
        } else {

            return redirect()->route('cart.index');
        }
    }

    public function downloadInvoice(string $id): Response
    {
        $order = Order::findOrFail($id);
        $cardsInCart = Card::findMany(explode(', ', $order->item));
        $cardsInSession = session('cards');

        $quantities = [];
        if ($cardsInSession) {
            foreach ($cardsInCart as $card) {
                if (isset($cardsInSession[$card->getId()])) {
                    $quantities[$card->getId()] = $cardsInSession[$card->getId()];
                } else {
                    $quantities[$card->getId()] = 1;
                }
            }
        } else {
            foreach ($cardsInCart as $card) {
                $quantities[$card->getId()] = 1;
            }
        }

        $pdf = Pdf::loadView('cart.invoice', [
            'order' => $order,
            'cards' => $cardsInCart,
            'quantities' => $quantities,
        ]);

        return $pdf->download('factura_'.$order->getId().'.pdf');
    }
}
