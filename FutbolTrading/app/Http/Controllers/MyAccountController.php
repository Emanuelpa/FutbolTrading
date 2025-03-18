<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders(): View
    {
        $viewData = [];
        $viewData['title'] = 'My Orders - Online Store';
        $viewData['subtitle'] = 'My Orders';
        $viewData['orders'] = Order::with(['items.card'])->where('user_id', Auth::user()->id)->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
