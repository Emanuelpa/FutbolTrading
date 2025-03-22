<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CardController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Cards - Online Store';
        $viewData['subtitle'] = 'List of cards';
        $viewData['cards'] = Card::all();

        return view('card.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $card = Card::findOrFail($id);
        $viewData['title'] = $card->getName().' - Online Store';
        $viewData['subtitle'] = $card->getName().' - Product information';
        $viewData['card'] = $card;

        return view('card.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create card';

        return view('card.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $card = new Card;
        $card->setName($request->input('name'));
        $card->setDescription($request->input('description'));
        $card->setImage($request->input('image'));
        $card->setPrice($request->input('price'));
        $card->setQuantity($request->input('quantity'));
        $card->save();

        return redirect()->back()->with('success', 'Item created successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $card = Card::findOrFail($id);
        $card->delete();

        return redirect()->route('card.index')->with('success', 'Card deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $cards = Card::where('name', 'LIKE', "%{$query}%")->get();

        $viewData = [];
        $viewData['title'] = 'Search Results';
        $viewData['subtitle'] = 'Results for "'.$query.'"';
        $viewData['cards'] = $cards;
    
        return view('card.index')->with('viewData', $viewData);
    }    
}
