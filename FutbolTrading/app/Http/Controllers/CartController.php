<?php

// TomasPineda

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Item;
use App\Models\Order;
use App\Services\DomPdfInvoiceGenerator;
use App\Services\MpPdfInvoiceGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    private $domPdfGenerator;

    private $snappyPdfGenerator;

    private $mpPdfGenerator;

    public function __construct(DomPdfInvoiceGenerator $domPdfGenerator, MpPdfInvoiceGenerator $mpPdfGenerator)
    {
        $this->domPdfGenerator = $domPdfGenerator;
        $this->mpPdfGenerator = $mpPdfGenerator;
    }

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
        $viewData['cards'] = $cardsInCart;
        $viewData['total'] = $total;

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
            $viewData['order'] = $order;

            return view('cart.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }

    public function downloadInvoice(Request $request, string $id): Response
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

        $type = $request->query('type', 'dompdf');

        if ($type === 'mpdf') {
            return $this->mpPdfGenerator->generateInvoice($order, $cardsInCart, $quantities);
        }

        return $this->domPdfGenerator->generateInvoice($order, $cardsInCart, $quantities);
    }
}
