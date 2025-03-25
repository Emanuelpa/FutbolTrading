<?php
//Emanuel Patiño

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        $fileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');

        return $path;
    }
}
