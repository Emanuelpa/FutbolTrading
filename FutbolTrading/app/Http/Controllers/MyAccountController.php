<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyAccountController extends Controller
{
    public function orders(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('MyAccount.title');
        $viewData['subtitle'] = __('MyAccount.subtitle');
        $viewData['order'] = __('MyAccount.order');
        $viewData['not_purchased'] = __('MyAccount.not_purchased');
        $viewData['item_id'] = __('MyAccount.item_id');
        $viewData['product_name'] = __('MyAccount.product_name');
        $viewData['price'] = __('MyAccount.price');
        $viewData['quantity'] = __('MyAccount.quantity');
        $viewData['date'] = __('MyAccount.date');
        $viewData['total'] = __('MyAccount.total');
        $viewData['payment_method'] = __('MyAccount.payment_method');

        $searchTerm = $request->input('search');
        $query = Order::with(['items.card'])->where('user', Auth::user()->getId());

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('id', 'like', '%'.$searchTerm.'%')
                    ->orWhere('paymentMethod', 'like', '%'.$searchTerm.'%');
            });
        }

        $viewData['orders'] = $query->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
