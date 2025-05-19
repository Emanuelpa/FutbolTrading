<?php

namespace App\Interfaces;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface InvoiceGeneratorInterface
{
    /**
     * Generate and return an invoice for the given order
     */
    public function generateInvoice(Order $order, Collection $cards, array $quantities): Response;
}
