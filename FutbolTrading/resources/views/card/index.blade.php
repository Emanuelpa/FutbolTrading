<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $viewData['title'] }}</title>
    <!-- Agrega estilos CSS si es necesario -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Título y subtítulo -->
        <h1 class="my-4">{{ $viewData['title'] }}</h1>
        <h2 class="mb-4">{{ $viewData['subtitle'] }}</h2>

        <!-- Lista de tarjetas -->
        <div class="row">
            @foreach ($viewData['cards'] as $card)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->name }}</h5>
                            <p class="card-text">
                                <strong>Description:</strong> {{ $card->description }}<br>
                                <strong>Price:</strong> ${{ $card->price }}
                            </p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Scripts de Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.b