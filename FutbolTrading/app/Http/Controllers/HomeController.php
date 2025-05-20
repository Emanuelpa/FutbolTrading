<?php

// TomasPineda

namespace App\Http\Controllers;

use App\Models\TradeProduct;
use App\Models\Card;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredCards = Card::latest()->take(3)->get();
        $featuredProducts = TradeProduct::latest()->take(3)->get();

        $viewData = [];
        $viewData['cards'] = $featuredCards;
        $viewData['products'] = $featuredProducts;
        return view('home.index')->with('viewData',$viewData);
    }
}
