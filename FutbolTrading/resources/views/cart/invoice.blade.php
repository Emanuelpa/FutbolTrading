<!DOCTYPE html>
<html>
<head>
<title>{{__('Purchase.purchase_invoice')}}</title>
</head>
<body>
    <p>{{__('Purchase.order_number')}}: {{ $order->getId() }}</p>
    <p>{{__('Purchase.date')}}: {{ $order->created_at }}</p>
    <p>{{__('Purchase.total')}}: ${{ number_format($order->getTotal(), 2) }}</p>
</body>
</html>