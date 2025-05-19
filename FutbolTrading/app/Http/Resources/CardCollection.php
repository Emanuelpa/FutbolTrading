<?php

// Emanuel Patiño

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CardCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => CardResource::collection($this->collection),
            'additionalData' => [
                'storeName' => 'FutbolTrading',
                'storeProductsLink' => 'http://44.194.99.117/cards',
            ],
        ];
    }
}
