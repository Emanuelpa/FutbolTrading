<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        $file = $request->file('image');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('images', $fileName, 'public');

        return $path;
    }
}
