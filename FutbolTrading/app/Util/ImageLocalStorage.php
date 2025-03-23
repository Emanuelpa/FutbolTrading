<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        $fileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');

        return $path;
    }
}
