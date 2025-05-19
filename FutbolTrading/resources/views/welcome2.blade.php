<!DOCTYPE html>
<html>

<head>
    <title>Idioma Test</title>
</head>

<body>
    <h1>{{ __('messages.greeting') }}</h1>

    <form action="{{ url('/toggle-language') }}" method="GET">
        <button type="submit">Cambiar idioma</button>
    </form>
</body>

</html>