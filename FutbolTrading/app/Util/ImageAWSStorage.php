<?php

// Emanuel Patiño

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageAWSStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        $file = $request->file('image');
        $path = $file->storePublicly('tradeProducts', 's3');

        return Storage::disk('s3')->url($path);
    }
}
