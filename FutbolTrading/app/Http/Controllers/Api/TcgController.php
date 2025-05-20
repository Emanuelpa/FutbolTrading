<?php

// Emanuel Patiño

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class TcgController extends Controller
{
    public function index(): View
    {
        try {
            $response = Http::timeout(5)->get('http://tcg-merket.shop/api/tcgcards');

            if ($response->successful()) {
                $json = $response->json();

                $products = $json['data'] ?? [];
                $additional = $json['additionalData'] ?? [];
            } else {
                $products = [];
                $additional = [];
            }
        } catch (\Exception $e) {
            $products = [];
            $additional = [];
        }

        $viewData['products'] = $products;
        $viewData['store'] = $additional;


        return view('tcg.index')->with('viewData', $viewData);
    }
}
