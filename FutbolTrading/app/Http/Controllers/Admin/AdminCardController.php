<?php

// Emanuel Patiño

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Card;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCardController extends Controller
{
    public function dashboard(): View
    {
        $viewData = [];
        $viewData['cards'] = Card::all();

        return view('admin.card.dashboard')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $card = Card::findOrFail($id);
            $viewData = [];
            $viewData['card'] = $card;

            return view('admin.card.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.card.dashboard');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
        try {

            $card = Card::findOrFail($id);
            $viewData = [];
            $viewData['card'] = $card;

            return view('admin.card.update')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.card.dashboard');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Card::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        $card = Card::findOrFail($id);

        $updateData = $request->only([
            'name',
            'description',
            'price',
            'quantity',
        ]);

        if ($request->hasFile('image')) {
            $updateData['image'] = $imagePath;
        }

        $card->update($updateData);

        $success = __('Admin.the_card').' '.$request->input('name').' '.__('Admin.has_been_updated');

        return redirect()->route('admin.card.dashboard')->with('success', $success);
    }

    public function create(): View
    {
        return view('admin.card.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Card::validate($request);

        $storeInterface = app(ImageStorage::class);
        $imagePath = $storeInterface->store($request);

        Card::create(array_merge(
            $request->only(['name', 'description', 'price', 'quantity']),
            ['image' => $imagePath]
        ));

        $success = __('Admin.the_card').' '.$request->input('name').' '.__('Admin.has_been_created');

        return redirect()->route('admin.card.dashboard')->with('success', $success);
    }

    public function delete(string $id): RedirectResponse
    {
        Card::destroy($id);

        $success = __('Admin.the_card').' '.__('Admin.has_been_deleted');

        return redirect()->route('admin.card.dashboard')->with('success', $success);
    }
}
