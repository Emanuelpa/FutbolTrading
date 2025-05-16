<?php

// TomasPineda

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
