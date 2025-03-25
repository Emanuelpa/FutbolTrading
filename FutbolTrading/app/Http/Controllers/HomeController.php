<?php
//TomasPineda
namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['welcome'] = __('Home.welcome');
        $viewData['transform'] = __('Home.transform');
        $viewData['transformDescription'] = __('Home.transformDescription');
        $viewData['authenticCards'] = __('Home.AuthenticCards');
        $viewData['authenticCardsDescription'] = __('Home.AuthenticCardsDescription');
        $viewData['rareFinds'] = __('Home.rareFinds');
        $viewData['rareFindsDescription'] = __('Home.rareFindsDescription');

        return view('home.index')->with('viewData', $viewData);
    }
}
