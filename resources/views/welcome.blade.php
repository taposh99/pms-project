<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

    <title>PMS</title>


    @viteReactRefresh
    @vite(['resources/js/index.css', 'resources/js/main.jsx'])
</head>

<body>
    <div id="root"></div>
</body>
{{-- <script src="{{asset('build/assets/Main-CvxgFSsN.js')}}"></script> --}}
</html>