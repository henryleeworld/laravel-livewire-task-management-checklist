<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CoreUI CSS -->
    @vite(['resources/sass/app.scss'])
    <link href="https://unpkg.com/@coreui/coreui@3.4.0/dist/css/coreui.min.css" rel="stylesheet" />
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    <div class="c-app flex-row align-items-center">
        <div class="container">
            @yield("content")
        </div>
    </div>
    @vite(['resources/js/app.js'])
    <script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.min.js"></script>
</body>
</html>
