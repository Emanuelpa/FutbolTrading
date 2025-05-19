<?php

namespace App\Services;

use App\Interfaces\InvoiceGeneratorInterface;
use App\Models\Order;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class SnappyPdfInvoiceGenerator implements InvoiceGeneratorInterface
{
    /**
     * Generate and return an invoice for the given order using Snappy PDF
     */
    public function generateInvoice(Order $order, Collection $cards, array $quantities): Response
    {
        $pdf = SnappyPdf::loadView('cart.invoice', [
            'order' => $order,
            'cards' => $cards,
            'quantities' => $quantities,
        ]);

        return $pdf->download('factura_'.$order->getId().'.pdf');
    }
}
