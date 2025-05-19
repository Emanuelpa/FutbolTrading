<?php

// app/Services/MpPdfInvoiceGenerator.php

namespace App\Services;

use App\Interfaces\InvoiceGeneratorInterface;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;

class MpPdfInvoiceGenerator implements InvoiceGeneratorInterface
{
    public function generateInvoice(Order $order, Collection $cards, array $quantities): Response
    {

        $html = View::make('cart.invoice', [
            'order' => $order,
            'cards' => $cards,
            'quantities' => $quantities,
        ])->render();

        $mpdf = new Mpdf;
        $mpdf->WriteHTML($html);
        $pdfContent = $mpdf->Output('', 'S');

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="factura_'.$order->getId().'.pdf"',
        ]);
    }
}
