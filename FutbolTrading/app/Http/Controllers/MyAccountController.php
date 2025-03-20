<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyAccountController extends Controller
{
    public function orders(): View
    {
        $viewData = [];
        $viewData['title'] = __('MyAccount.title');
        $viewData['subtitle'] = __('MyAccount.subtitle');
        $viewData['order'] = __('MyAccount.order');
        $viewData['not_purchased'] = __('MyAccpunt.not_purchased');
        $viewData['orders'] = Order::with(['items.card'])->where('user_id', Auth::user()->getId())->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
