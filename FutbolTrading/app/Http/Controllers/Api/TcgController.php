<?php

// Emanuel Patiño

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TcgController extends Controller
{
    public function index()
    {
        $response = Http::get('http://tcg-merket.shop/api/tcgcards');
        $json = $response->json();

        $products = $json['data'];
        $additional = $json['additionalData'];

        $viewData = [];
        $viewData['products'] = $products;
        $viewData['store'] = $additional;

        return view('tcg.index')->with('viewData', $viewData);
    }
}
