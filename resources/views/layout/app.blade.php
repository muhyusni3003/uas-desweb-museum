<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Koleksi Lukisan')</title>
	<title>Museum Geologi | Home</title>
	<link rel="stylesheet" type="text/css" href="/resources/css/style.css">
    <link rel="stylesheet" href="{{ asset('css/filament/style.css') }}">
</head>
<body>

    @yield('content')
    @stack('after-scripts')

</body>
</html>
