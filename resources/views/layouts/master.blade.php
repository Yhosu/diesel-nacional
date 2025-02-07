<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', config('capyei.description'))">
    <meta name="keywords" content="@yield('keywords', config('capyei.keywords'))">
    <meta name="author" content="{{ config('app.author') }}">
    <title>@yield('title', config('app.name'))</title>

    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COpen+Sans:400,700,800&display=swap" rel="stylesheet" type="text/css">

    @stack('prehead')

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([
            // Custom
            'resources/css/app.css',
            'resources/scss/main.scss',
            'resources/js/main.js',
            'resources/js/master/main.js',
        ])
    @endif

    @stack('head')
</head>
<body class="cy-web">

    <main role="main" class="main">
        {{ $slot }}
    </main>

    @stack('scripts')
</body>
</html>