<?php
// Emanuel Patiño

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardCollection;
use App\Models\Card;
use Illuminate\Http\JsonResponse;

class CardApiController extends Controller
{
    public function index(): JsonResponse
    {
        $cards = new CardCollection(Card::all());
        return response()->json($cards, 200);
    }
}
