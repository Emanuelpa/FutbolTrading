<?php

// Emanuel Patiño

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Util\ImageAWSStorage;
use App\Util\ImageLocalStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function ($app, $params) {
            $storage = $params['storage'];
            if ($storage == 'local') {
                return new ImageLocalStorage;
            } elseif ($storage == 'AWS') {
                return new ImageAWSStorage;
            }
        });
    }
}
