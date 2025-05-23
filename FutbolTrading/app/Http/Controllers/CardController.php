<?php

// MarcelaLondoño

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
        $viewData['cards'] = Card::all();

        return view('card.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $card = Card::findOrFail($id);
        $viewData['card'] = $card;

        return view('card.show')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $cardData = $request->only(['name', 'description', 'image', 'price', 'quantity']);
        Card::create($cardData);

        return redirect()->back()->with('success', __('card.created'));
    }

    public function destroy(string $id): RedirectResponse
    {
        $card = Card::findOrFail($id);
        $card->delete();

        return redirect()->route('card.index')->with('success', __('card.deleted'));
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $cards = Card::where('name', 'LIKE', "%{$query}%")->get();

        $viewData = [];
        $viewData['cards'] = $cards;

        return view('card.index')->with('viewData', $viewData);
    }
}
