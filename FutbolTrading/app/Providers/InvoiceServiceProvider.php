<?php

namespace App\Providers;

use App\Services\DomPdfInvoiceGenerator;
use App\Services\MpPdfInvoiceGenerator;
use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->singleton(DomPdfInvoiceGenerator::class);
        $this->app->singleton(MpPdfInvoiceGenerator::class);

    }
}
