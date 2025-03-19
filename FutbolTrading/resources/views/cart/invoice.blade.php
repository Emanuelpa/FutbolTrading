<!DOCTYPE html>
<html>
<head>
    <title>Factura de Compra</title>
</head>
<body>
    <h1>Factura de Compra</h1>
    <p>Número de Orden: {{ $order->getId() }}</p>
    <p>Fecha: {{ $order->created_at }}</p>
    <p>Total: ${{ number_format($order->getTotal(), 2) }}</p>

    <!-- Mostrar el código de barras estático -->
    <div>
        <h3>Código de Barras:</h3>
        <img src="{{ asset('images/barcode.png') }}" alt="Código de Barras" style="width: 200px; height: auto;">
    </div>
</body>
</html>