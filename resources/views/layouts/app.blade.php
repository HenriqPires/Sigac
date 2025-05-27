<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>{{ config('app.name', 'SIGAC') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-dark">
    @include('layouts.navigation')

    @hasSection('header')
    <header class="bg-success text-white py-4 mb-4">
        <div class="container">
            <h1 class="h3 mb-0 text-center">
                @yield('header')
            </h1>
        </div>
    </header>
    @endif

    <main class="container pb-5">
        @yield('content')
    </main>
</body>
</html>


