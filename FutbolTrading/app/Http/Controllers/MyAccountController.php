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

        // Obtener el término de búsqueda del request
        $searchTerm = $request->input('search');

        // Consulta base para obtener las órdenes del usuario
        $query = Order::with(['items.card'])->where('user_id', Auth::user()->getId());

        // Aplicar filtro de búsqueda si existe
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
