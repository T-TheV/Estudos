<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') - SIGA-SAÚDE</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   
</head>
<body>
    @include('partials._navbar')
    @yield('content')
</body>
</html>