<!doctype html>
<html class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="h-full">
    {{ $slot }}

    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
