<?php

namespace App\Services;

use App\Interfaces\InvoiceGeneratorInterface;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class DomPdfInvoiceGenerator implements InvoiceGeneratorInterface
{
    /**
     * Generate and return an invoice for the given order using DomPDF
     */
    public function generateInvoice(Order $order, Collection $cards, array $quantities): Response
    {
        $pdf = Pdf::loadView('cart.invoice', [
            'order' => $order,
            'cards' => $cards,
            'quantities' => $quantities,
        ]);

        return $pdf->download('factura_'.$order->getId().'.pdf');
    }
}
