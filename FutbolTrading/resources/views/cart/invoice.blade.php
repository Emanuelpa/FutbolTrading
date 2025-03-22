<!DOCTYPE html>
<html>
<head>
<title>Purchase Invoice</title>
</head>
<body>
    <p>Order Number: {{ $order->getId() }}</p>
    <p>Date: {{ $order->created_at }}</p>
    <p>Total: ${{ number_format($order->getTotal(), 2) }}</p>
</body>
</html>