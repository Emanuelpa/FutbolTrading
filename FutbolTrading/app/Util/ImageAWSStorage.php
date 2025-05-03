<?php

// Emanuel Patiño

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;

class ImageAWSStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        return "";
    }
}
