<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PMS</title>


    @viteReactRefresh
    @vite(['resources/js/index.css', 'resources/js/Main.jsx'])
</head>

<body>

    <div id="root"></div>
</body>

</html>
